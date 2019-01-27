<script>
    $('.form-check-input').change(function(){
        $('#status-toggle')
        .append($("<input value='{{ csrf_token() }}'>").attr('name',"_token"))
        .append($("<input value='"+$(this).prop('checked')+"'>").attr('name',"complete"))
        .append($("<input value='"+$(this).attr('data-task-id')+"'>").attr('name',"task"))
        .submit();
    });
</script>