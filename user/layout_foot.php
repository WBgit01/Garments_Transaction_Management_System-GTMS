<!-- all js script will be placed here -->
<script src="../libs/javascript/user-script.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
// JavaScript for deleting product
$(document).on('click', '.delete-object', function(){
  
    var id = $(this).attr('delete-id');
  
    if (confirm("Are you sure to remove this request?")) {
        $.post('delete_request.php', {
            object_id: id
        }, function(data){
            location.reload();
        }).fail(function() {
            alert('Unable to delete.');
        });
    }

    return false;
});

</script>
</body>
</html>