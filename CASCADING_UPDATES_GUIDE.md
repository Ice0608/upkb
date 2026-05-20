# Cascading Updates Guide

## Overview

This guide explains how the cascading update system works in the UPKB application. When an institution code (`kod_institusi`) or course code (`kod_kursus`) is changed, all related records automatically update to maintain data consistency.

## How It Works

The system uses Laravel Model Observers to detect when codes are changed and automatically update all related records. This prevents data inconsistencies that could occur if some records retained the old code while others were updated.

### Model Observers

Two observers have been created to handle cascading updates:

#### 1. **InstitusiObserver** (`app/Observers/InstitusiObserver.php`)

Monitors changes to the `Institusi` model. When `kod_institusi` changes, it automatically updates:

- **Kursus** - All courses linked to the institution
- **Galeri** - All gallery images for the institution
- **Kerjaya** - All career information
- **SyaratKelayakan** - All eligibility requirements
- **Elaun** - All allowance records
- **YuranPendaftaran** - All registration fees
- **YuranPilihan** - All choice fees
- **YuranAsrama** - All hostel fees
- **YuranPengajian** - All tuition fees

**Trigger:** When editing an institution and changing its code

```php
// Example: Changing institution code from "INST001" to "INST002"
// All related records automatically update their kod_institusi field
```

#### 2. **KursusObserver** (`app/Observers/KursusObserver.php`)

Monitors changes to the `Kursus` model. When `kod_kursus` changes, it automatically updates:

- **Galeri** - Course gallery images
- **Kerjaya** - Course career information
- **SyaratKelayakan** - Course eligibility requirements
- **Elaun** - Course allowance records

**Trigger:** When editing a course and changing its code

```php
// Example: Changing course code from "KURS001" to "KURS002"
// All course-related records automatically update their kod_kursus field
```

## Usage

### Changing Institution Code

1. Navigate to **Admin → Edit Institusi**
2. Modify the "Kod Institusi" field with the new code
3. Click "Simpan Kemas Kini" (Save Updates)
4. The system will:
   - Validate that the new code is unique
   - Update the institution record
   - Automatically update all 900+ related records across all related tables
   - Display a success message

### Changing Course Code

1. Navigate to **Admin → Edit Kursus**
2. Modify the "Kod Kursus" field with the new code
3. Click "Simpan Maklumat" (Save Information)
4. The system will:
   - Validate that the new code is unique
   - Update the course record
   - Automatically update all related records
   - Display a success message

## Technical Details

### Observer Registration

The observers are registered in `app/Providers/AppServiceProvider.php`:

```php
public function boot(): void
{
    Institusi::observe(InstitusiObserver::class);
    Kursus::observe(KursusObserver::class);
}
```

### Validation

To prevent duplicate codes:

- **Institution Code**: Must be unique across all institutions
- **Course Code**: Must be unique across all courses

If you attempt to change a code to one that already exists, the system will display a validation error and prevent the update.

### Data Consistency

The cascading update ensures:
- No orphaned records with old codes
- Consistent data across all related tables
- Automatic synchronization without manual intervention
- No need for separate update operations

## Benefits

✓ **Data Integrity**: Prevents inconsistent data states
✓ **Automated**: No manual updates needed
✓ **Efficient**: Single-pass update operation
✓ **Reliable**: Uses Laravel's built-in observer pattern
✓ **Validated**: Duplicate codes are prevented
✓ **Transparent**: Users see single update operation

## Database Tables Affected

When changing `kod_institusi`:
```
institutis → kursuses → galeries, kerjayas, syarat_kelayakans, elauns
         → yuran_pendaftarans
         → yuran_pilihans
         → yuran_asramas
         → yuran_pengajians
```

When changing `kod_kursus`:
```
kursuses → galeries
        → kerjayas
        → syarat_kelayakans
        → elauns
```

## Error Handling

If an update fails:
1. A validation error message is displayed
2. No changes are committed to the database
3. The user can review and correct the issue
4. The update can be retried

## Best Practices

1. **Plan Code Changes**: Decide on new codes before making changes
2. **Verify Uniqueness**: Ensure new codes don't already exist
3. **Single Session**: Make all code changes in one editing session
4. **Backup**: Consider backing up data before major code changes
5. **Test**: Test code changes in a staging environment first

## Troubleshooting

### Code Change Not Reflected

**Issue**: Changed a code but related records still show old code

**Solution**:
- Clear application cache: `php artisan cache:clear`
- Refresh the page in your browser
- Check that you clicked "Save" and received confirmation

### Duplicate Code Error

**Issue**: Receiving "The kod_institusi/kod_kursus has already been taken" error

**Solution**:
- Choose a different code that doesn't already exist
- Check existing codes to find an available one
- Ensure you're not accidentally using a code that another institution/course already has

### Update Seems Slow

**Issue**: Code change takes longer than expected

**Solution**:
- This is normal if there are many related records (galleries, fees, requirements, etc.)
- The system is updating all related tables to maintain consistency
- Wait for the success message to appear

## Related Files

- Observer Registration: `app/Providers/AppServiceProvider.php`
- Institution Observer: `app/Observers/InstitusiObserver.php`
- Course Observer: `app/Observers/KursusObserver.php`
- Controllers: 
  - `app/Http/Controllers/AdminInstitusiController.php`
  - `app/Http/Controllers/AdminKursusController.php`

## Support

For issues or questions about cascading updates, refer to:
1. This guide
2. Application logs in `storage/logs/`
3. Database records for audit trail
