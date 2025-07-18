import './bootstrap';
import Swal from 'sweetalert2';

// Opcional: Torne-o disponível globalmente (para uso em qualquer lugar)
window.Swal = Swal;


$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
