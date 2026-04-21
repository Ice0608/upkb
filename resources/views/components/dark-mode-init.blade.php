{{-- This script MUST run in <head> before page renders to prevent flash --}}
<script>
    (function() {
        // Only activate dark if user explicitly chose it — default is always light
        if (localStorage.getItem('color-theme') === 'dark') {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }
    })();
</script>
