const clients = () => {
    const controller = "http://127.0.0.1:7452/clients/list";
    const filter = {};
    $.getJSON(controller, filter, (result) => {
        console.log(result);
        let temp_html = "";
        $.each(result, (index, val) => {
            temp_html = `<tr>
                <td>${val.id}</td>
                <td>${val.image_path}</td>
                <td>${val.status}</td>
                <td>${val.is_trash}</td>
            </tr>`;
            $("#clients_list").append(temp_html);
        });
    });
}

$(document).ready(function() {
clients();  
});