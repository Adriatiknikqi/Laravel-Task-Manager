<div class="container mt-4">
    @if(session('success'))
        <div class="alert alert-success text-center mx-auto" style="max-width: 600px;">
            <i class="fas fa-check-circle"></i>
            <strong>Success!</strong> {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger text-center mx-auto" style="max-width: 600px;">
            <i class="fas fa-exclamation-triangle"></i>
          {{ session('error') }}
        </div>
    @endif
</div>

<script>
    setTimeout(function() {
        const alerts = document.querySelectorAll('.alert');
        alerts.forEach(alert => {
            alert.style.transition = 'opacity 0.5s ease';
            alert.style.opacity = '0';
            setTimeout(() => alert.remove(), 500); 
        });
    }, 5000); 
</script>