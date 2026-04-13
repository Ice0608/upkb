<?php

namespace App\Http\Controllers;

use App\Models\Kursus;
use Illuminate\Http\Request;

class CourseListingController extends Controller
{
    /**
     * Display all courses with sidebar filter (CoreCureLabs style)
     */
    public function index(Request $request)
    {
        $negeri = $request->input('negeri');
        $kuota = $request->input('kuota');

        // Get all courses with institution data for sidebar
        $allCourses = Kursus::with('institusi')->get();

        // Filter displayed courses based on negeri and kuota
        $displayedCourses = $allCourses;

        if ($negeri) {
            $displayedCourses = $displayedCourses->filter(function ($course) use ($negeri) {
                return strpos($course->institusi->alamat, $negeri) !== false;
            });
        }

        if ($kuota) {
            $displayedCourses = $displayedCourses->filter(function ($course) {
                return $course->kuota && $course->kuota > 0;
            });
        }

        // Extract unique states for filter
        $states = [];
        foreach ($allCourses as $course) {
            $parts = explode(',', $course->institusi->alamat);
            $state = trim(end($parts));
            if (!in_array($state, $states)) {
                $states[] = $state;
            }
        }
        sort($states);

        return view('program.katalogkursus', [
            'allCourses' => $allCourses,
            'displayedCourses' => $displayedCourses,
            'states' => $states,
            'selectedNegeri' => $negeri,
            'selectedKuota' => $kuota,
        ]);
    }

    /**
     * Display single course detail 
     * Redirects to the existing infokursus page
     */
    public function show($kodKursus)
    {
        $course = Kursus::where('kod_kursus', $kodKursus)->firstOrFail();
        
        // Redirect to the existing infokursus page using the course ID
        return redirect()->route('kursus.show', ['id' => $course->id]);
    }

    /**
     * Filter institutions by selected fee (AJAX endpoint)
     */
    public function filterByFee($kodKursus, Request $request)
    {
        $selectedFee = $request->input('fee');

        $coursesByInstitution = Kursus::where('nama_kursus', function ($query) use ($kodKursus) {
            $query->select('nama_kursus')
                  ->from('kursuses')
                  ->where('kod_kursus', $kodKursus);
        })
        ->with('institusi');

        if ($selectedFee) {
            // Filter by selected fee
            $coursesByInstitution->whereHas('yuranPengajians', function ($query) use ($selectedFee) {
                $query->where('amount', $selectedFee);
            })->orWhereHas('yuranPendaftarans', function ($query) use ($selectedFee) {
                $query->where('amount', $selectedFee);
            });
        }

        $courses = $coursesByInstitution->get();

        return response()->json([
            'success' => true,
            'institutions' => $courses->map(function ($c) {
                return [
                    'id' => $c->id,
                    'kod_kursus' => $c->kod_kursus,
                    'kod_institusi' => $c->kod_institusi,
                    'institusi_nama' => $c->institusi->nama_institusi,
                    'institusi_alamat' => $c->institusi->alamat,
                    'institusi_image' => $c->institusi->gambar_institusi,
                    'jenis_institusi' => $c->institusi->jenis_institusi,
                ];
            }),
            'count' => $courses->count()
        ]);
    }
}
