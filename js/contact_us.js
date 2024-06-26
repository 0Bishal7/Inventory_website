$(document).ready(function() {
    const fetchContactUs = () => {
        $.ajax({
            url: "http://127.0.0.1:7452/contact_us/list",
            method: "GET",
            success: function(result) {
                console.log(result);
                let temp_html = "";
                $.each(result, (index, val) => {
                    temp_html = `<tr>
                        <td>${val.id}</td>
                        <td>${val.Name}</td>
                        <td>${val.Email}</td>
                        <td>${val.subject}</td>
                        <td>${val.message}</td>
                        <td><i class="fa fa-${val.status ? 'toggle-on' : 'toggle-off'}" onclick="changeStatus(${val.id}, ${val.status}, ${index})"></i></td>
                        <td>${val.is_trash}</td>
                    </tr>`;
                    $("#contact_us").append(temp_html);
                });
            },
            error: function(xhr, status, error) {
                console.error("AJAX error: " + status + ", " + error);
            }
        });
    }

    fetchContactUs();
});