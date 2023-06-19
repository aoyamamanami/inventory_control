 /*global fetch*/
 /*global drawChart*/ 
document.getElementById('updateForm').addEventListener('submit', function(event) {
    event.preventDefault();

    var formData = new FormData(this);
    var productId = "{{ $product->id }}";
    formData.append('_method', 'PUT');
    var token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    formData.append('_token',　token);

    fetch('/products/' + productId, {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        drawChart(data.chartData);
    })
    .catch(error => {
        console.error(error);
    });
});