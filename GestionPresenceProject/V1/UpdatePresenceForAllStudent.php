<script>
function updateIsPresentForEtudiant() {
    $.ajax({
        url: '../V1/UpdatePresence.php',
        type: 'POST',
        success: function(response) {
            alert(response); // Affichez le message de succès ou de toute autre réponse
        },
        error: function() {
            alert('Erreur lors de la mise à jour');
        }
    });
}
</script>