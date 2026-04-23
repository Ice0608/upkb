# Task: Fix loginpelajar sahkan button redirect to pelajar.infokursus while keeping IC verify

## Steps:
1. ~~Create TODO.md~~ (done)
2. ✅ Edit `app/Http/Controllers/StaffEventController.php`: Updated `pelajarVerifyIc` success redirect to conditional pelajar.infokursus (pilihan_pertama → first kursus → program fallback).
3. [ ] Test: Go to pelajar login → enter correct IC → sahkan → lands on infokursus page.
4. [ ] Verify IC fail: Wrong IC → shows error, no redirect.
5. [ ] Run `php artisan route:clear` if routes cached.
6. [ ] Complete task.

**Progress:** Edit complete. Test flow manually (XAMPP server at http://localhost/upkb). IC verify intact, redirect now direct to infokursus.
