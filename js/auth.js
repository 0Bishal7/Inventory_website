const pathUrl = $('#pathurl').val();
const who_are_we = (first_name, email_id, mail_body, subject_text) => {
    $("#who_are_we").empty();
    
    const controller = "http://127.0.0.1:7452/who_are_we/list";
    const filter = {
        first_name: first_name,
        email_id: email_id,
        mail_body: mail_body,
        subject_text: subject_text
    };
    $.getJSON(controller, filter, (result) => {
        console.log(result);
        let temp_html = "";
        $.each(result, (index, val) => {
            temp_html = `<tr>
                <td>${val.id}</td>
                <td>${val.category}</td>
                <td>${val.title}</td>
                <td>${val.description}</td>
                <td>${val.external_link}</td>
                <td><img src="${pathUrl}${val.image_path}" alt="${val.title}" width="100" height="100" /></td>

                <td><i class="fa p-cursor fa-${val.status ? 'toggle-on' : 'toggle-off'}" onclick="changeStatus(${val.id}, ${val.status}, ${index},'who_are_we')"></i></td>

                <td><i class="fa fa-trash p-cursor" onclick="removeRecord(${val.id}, ${val.is_trash}, ${index},'who_are_we')"></i></td>
                
            </tr>`;
            $("#who_are_we").append(temp_html);
        });
    });
}


const changeStatus = (id, status, index,t_name) => {
    const controller = `http://127.0.0.1:7452/${t_name}/change_status`
    var formData = new FormData();
    formData.append('id', id);
    formData.append('status', status && status == 1 ? 0 : 1);
    $.ajax({
        type: 'POST',
        url: controller,
        data: formData,
        contentType: false,
        cache: false,
        processData: false,
        success: (response) => {
            eval(t_name)()
        },
        error: (xhr, status, error) => {
            console.error(`Error: ${status} - ${error}`);
            alert('Error Changing status!');
        }
    });
}

const removeRecord = (id, is_trash, index,t_name) => {
    console.log(id, is_trash, index)
    const controller = `http://127.0.0.1:7452/${t_name}/delete`
    const body = {
        id: id,
        is_trash: is_trash && is_trash == 1 ? 0 : 1
    }

    $.ajax({
        url: controller,
        type: 'POST',
        contentType: 'application/json',
        data: JSON.stringify(body),
        success: (response) => {
            if (response.res === 1) {
                console.log(response.Msg);
                eval(t_name)()
            }
        },
        error: (xhr, status, error) => {
            console.error(`Error: ${status} - ${error}`);
        }
    });
}

const our_values = () => {
    $("#our_values_list").empty();

    const controller = "http://127.0.0.1:7452/our_values/list";
    const filter = {
    };
    $.getJSON(controller, filter, (result) => {
        console.log(result);
        let temp_html = "";
        $.each(result, (index, val) => {
            temp_html = `<tr>
                <td>${val.id}</td>
                <td>${val.Title}</td>
                <td><img src="${pathUrl}${val.C1_Image_path}" alt="${val.C1_Title}" width="100" height="100" /></td>
                <td>${val.C1_Title}</td>
                <td>${val.C1_Description}</td>
                <td><img src="${pathUrl}${val.C2_Image_path}" alt="${val.C1_Title}" width="100" height="100" /></td>
                <td>${val.C2_Title}</td>
                <td>${val.C2_Description}</td>
                
                <td><i class="fa p-cursor fa-${val.status ? 'toggle-on' : 'toggle-off'}" onclick="changeStatus(${val.id}, ${val.status}, ${index},'our_values')"></i></td>
                
                <td><i class="fa fa-trash p-cursor" onclick="removeRecord(${val.id}, ${val.is_trash}, ${index},'our_values')"></i></td>

            </tr>`;
            $("#our_values_list").append(temp_html);
        });
    });
}


const clients = () => {
    $("#clients_list").empty();

    const controller = "http://127.0.0.1:7452/clients/list";
    const filter = {};
    $.getJSON(controller, filter, (result) => {
        console.log(result);
        let temp_html = "";
        $.each(result, (index, val) => {
            temp_html = `<tr>
                <td>${val.id}</td>
                <td><img src="${pathUrl}${val.image_path}" alt="${val.id}" width="100" height="100" /></td>

                <td><i class="fa p-cursor fa-${val.status ? 'toggle-on' : 'toggle-off'}" onclick="changeStatus(${val.id}, ${val.status}, ${index},'clients')"></i></td>
                
                <td><i class="fa fa-trash p-cursor" onclick="removeRecord(${val.id}, ${val.is_trash}, ${index},'clients')"></i></td>

            </tr>`;
            $("#clients_list").append(temp_html);
        });
    });
}

const recent_posts = () => {
    $("#recent_posts").empty();

    const controller = "http://127.0.0.1:7452/recent_posts/list";
    const filter = {};
    $.getJSON(controller, filter, (result) => {
        console.log(result);
        let temp_html = "";
        $.each(result, (index, val) => {
            temp_html = `<tr>
                <td>${val.id}</td>
                <td><img src="${pathUrl}${val.image_path}" alt="${val.title}" width="100" height="100" /></td>

                <td>${val.title}</td>
                <td>${val.name}</td>
                <td>${val.info}</td>
                <td>${val.external_link}</td>
                <td><i class="fa p-cursor fa-${val.status ? 'toggle-on' : 'toggle-off'}" onclick="changeStatus(${val.id}, ${val.status}, ${index},'recent_posts')"></i></td>
                
                <td><i class="fa fa-trash p-cursor" onclick="removeRecord(${val.id}, ${val.is_trash}, ${index},'recent_posts')"></i></td>

            </tr>`;
            $("#recent_posts").append(temp_html);
        });
    });
}


const contact_us = () => {
    $("#contact_us").empty();

    const controller = "http://127.0.0.1:7452/contact_us/list";
    const filter = {};
    $.getJSON(controller, filter, (result) => {
        console.log(result);
        let temp_html = "";
        $.each(result, (index, val) => {
            temp_html = `<tr>
                <td>${val.id}</td>
                <td>${val.Name}</td>
                <td>${val.Email}</td>
                <td>${val.subject}</td>
                <td>${val.message}</td>
                <td><i class="fa p-cursor fa-${val.status ? 'toggle-on' : 'toggle-off'}" onclick="changeStatus(${val.id}, ${val.status}, ${index},'contact_us')"></i></td>
                
                <td><i class="fa fa-trash p-cursor" onclick="removeRecord(${val.id}, ${val.is_trash}, ${index},'contact_us')"></i></td>

                
                 
            </tr>`;
            $("#contact_us").append(temp_html);
        });
    });
}

const contact_us_details = () => {
    $("#contact_us_details").empty();

    const controller = "http://127.0.0.1:7452/contact_us_details/list";
    const filter = {
    };
    $.getJSON(controller, filter, (result) => {
        console.log(result);
        let temp_html = "";
        $.each(result, (index, val) => {
            temp_html = `<tr>
                <td>${val.id}</td>
                <td><img src="${pathUrl}${val.icon}" alt="${val.info_1}" width="30" height="30" /></td>

                <td>${val.Details}</td>
                <td>${val.info_1}</td>
                <td>${val.info_2}</td>
                <td><i class="fa p-cursor fa-${val.status ? 'toggle-on' : 'toggle-off'}" onclick="changeStatus(${val.id}, ${val.status}, ${index},'contact_us_details')"></i></td>
                
                <td><i class="fa fa-trash p-cursor" onclick="removeRecord(${val.id}, ${val.is_trash}, ${index},'contact_us_details')"></i></td>

                
                   
            </tr>`;
            $("#contact_us_details").append(temp_html);
        });
    });
}


const team = () => {
    $("#team").empty();

    const controller = "http://127.0.0.1:7452/team/list";
    const filter = {};
    $.getJSON(controller, filter, (result) => {
        console.log(result);
        let temp_html = "";
        $.each(result, (index, val) => {
            temp_html = `<tr>
                <td>${val.id}</td>
                <td><img src="${pathUrl}${val.image_path}" alt="${val.Name}" width="100" height="100" /></td>

                <td>${val.Name}</td>
                <td>${val.job_Title}</td>
                <td>${val.Description}</td>
                <td>${val.Twitter_link}</td>
                <td>${val.Facebook_link}</td>
                <td>${val.instagram_link}</td>
                <td>${val.Linkdin_link}</td>
                <td><i class="fa p-cursor fa-${val.status ? 'toggle-on' : 'toggle-off'}" onclick="changeStatus(${val.id}, ${val.status}, ${index},'team')"></i></td>
                
                <td><i class="fa fa-trash p-cursor" onclick="removeRecord(${val.id}, ${val.is_trash}, ${index},'team')"></i></td>

            </tr>`;
            $("#team").append(temp_html);
        });
    });
}

// testimonials

const testimonials = () => {
    $("#testimonials").empty();

    const controller = "http://127.0.0.1:7452/testimonials/list";
    const filter = {};
    $.getJSON(controller, filter, (result) => {
        console.log(result);
        let temp_html = "";
        $.each(result, (index, val) => {
            temp_html = `<tr>
                <td>${val.id}</td>
                <td>${val.Rating}</td>
                <td>${val.description}</td>
                <td><img src="${pathUrl}${val.image_path}" alt="${val.Name}" width="100" height="100" /></td>

                <td>${val.Name}</td>
                <td>${val.job_title}</td>
                <td><i class="fa p-cursor fa-${val.status ? 'toggle-on' : 'toggle-off'}" onclick="changeStatus(${val.id}, ${val.status}, ${index},'testimonials')"></i></td>
                
                <td><i class="fa fa-trash p-cursor" onclick="removeRecord(${val.id}, ${val.is_trash}, ${index},'testimonials')"></i></td>

            </tr>`;
            $("#testimonials").append(temp_html);
        });
    });
}

// services
const services = () => {
    $("#services").empty();

    const controller = "http://127.0.0.1:7452/services/list";
    const filter = {};
    $.getJSON(controller, filter, (result) => {
        console.log(result);
        let temp_html = "";
        $.each(result, (index, val) => {
            temp_html = `<tr>
                <td>${val.id}</td>
                <td><img src="${pathUrl}${val.icon}" alt="${val.C1_title}" width="30" height="30" /></td>

                <td>${val.title}</td>
                <td>${val.description}</td>
                <td>${val.external_link}</td>
                <td><i class="fa p-cursor fa-${val.status ? 'toggle-on' : 'toggle-off'}" onclick="changeStatus(${val.id}, ${val.status}, ${index},'services')"></i></td>
                
                <td><i class="fa fa-trash p-cursor" onclick="removeRecord(${val.id}, ${val.is_trash}, ${index},'services')"></i></td>

            </tr>`;
            $("#services").append(temp_html);
        });
    });
}

// pricing
const pricing = () => {
    $("#pricing").empty();

    const controller = "http://127.0.0.1:7452/pricing/list";
    const filter = {};
    $.getJSON(controller, filter, (result) => {
        console.log(result);
        let temp_html = "";
        $.each(result, (index, val) => {
            temp_html = `<tr>
                <td>${val.id}</td>
                <td>${val.Plan_name}</td>
                <td>${val.Plan_price}</td>
                <td><img src="${pathUrl}${val.icon}" alt="${val.Plan_name}" width="30" height="30" /></td>

                <td>${val.Features}</td>
                <td><i class="fa p-cursor fa-${val.status ? 'toggle-on' : 'toggle-off'}" onclick="changeStatus(${val.id}, ${val.status}, ${index},'pricing')"></i></td>
                
                <td><i class="fa fa-trash p-cursor" onclick="removeRecord(${val.id}, ${val.is_trash}, ${index},'pricing')"></i></td>

                 
            </tr>`;
            $("#pricing").append(temp_html);
        });
    });
}

// faq
const faq = () => {
    $("#faq").empty();

    const controller = "http://127.0.0.1:7452/faq/list";
    const filter = {};
    $.getJSON(controller, filter, (result) => {
        console.log(result);
        let temp_html = "";
        $.each(result, (index, val) => {
            temp_html = `<tr>
                <td>${val.id}</td>
                <td>${val.question}</td>
                <td>${val.answer}</td>
                <td><i class="fa p-cursor fa-${val.status ? 'toggle-on' : 'toggle-off'}" onclick="changeStatus(${val.id}, ${val.status}, ${index},'faq')"></i></td>
                
                <td><i class="fa fa-trash p-cursor" onclick="removeRecord(${val.id}, ${val.is_trash}, ${index},'faq')"></i></td>

            </tr>`;
            $("#faq").append(temp_html);
        });
    });
}


// organization
const organization = () => {
    $("#organization").empty();

    const controller = "http://127.0.0.1:7452/organization/list";
    const filter = {};
    $.getJSON(controller, filter, (result) => {
        console.log(result);
        let temp_html = "";
        $.each(result, (index, val) => {
            temp_html = `<tr>
                <td>${val.id}</td>
                <td>${val.name}</td>
                <td><img src="${pathUrl}${val.logo}" alt="${val.name}" width="30" height="30" /></td>

                <td>${val.contact}</td>
                <td>${val.address}</td>
                <td>${val.created}</td>
                <td>${val.description}</td>
                <td><i class="fa p-cursor fa-${val.status ? 'toggle-on' : 'toggle-off'}" onclick="changeStatus(${val.id}, ${val.status}, ${index},'organization')"></i></td>
                
                <td><i class="fa fa-trash p-cursor" onclick="removeRecord(${val.id}, ${val.is_trash}, ${index},'organization')"></i></td>

            </tr>`;
            $("#organization").append(temp_html);
        });
    });
}



// notice
const notice = () => {
    $("#notice").empty();

    const controller = "http://127.0.0.1:7452/notice/list";
    const filter = {};
    $.getJSON(controller, filter, (result) => {
        console.log(result);
        let temp_html = "";
        $.each(result, (index, val) => {
            temp_html = `<tr>
                <td>${val.id}</td>
                <td>${val.title}</td>
                <td>${val.description}</td>
                <td><img src="${pathUrl}${val.file_path}" alt="${val.title}" width="100" height="100" /></td>
                <td>${val.last_update}</td>
                <td>${val.created}</td>
                <td><i class="fa p-cursor fa-${val.status ? 'toggle-on' : 'toggle-off'}" onclick="changeStatus(${val.id}, ${val.status}, ${index},'notice')"></i></td>
                
                <td><i class="fa fa-trash p-cursor" onclick="removeRecord(${val.id}, ${val.is_trash}, ${index},'notice')"></i></td>

            </tr>`;
            $("#notice").append(temp_html);
        });
    });
}
// gallery
const gallery = () => {
    $("#gallery").empty();

    const controller = "http://127.0.0.1:7452/gallery/list";
    const filter = {};
    $.getJSON(controller, filter, (result) => {
        console.log(result);
        let temp_html = "";
        $.each(result, (index, val) => {
            temp_html = `<tr>
                <td>${val.id}</td>
                <td>${val.folder_name}</td>
                <td><img src="${pathUrl}${val.folder_root}" alt="${val.folder_name}" width="100" height="100" /></td>

                <td>${val.last_update}</td>
                <td>${val.created}</td>
                <td><i class="fa p-cursor fa-${val.status ? 'toggle-on' : 'toggle-off'}" onclick="changeStatus(${val.id}, ${val.status}, ${index},'gallery')"></i></td>
                
                <td><i class="fa fa-trash p-cursor" onclick="removeRecord(${val.id}, ${val.is_trash}, ${index},'gallery')"></i></td>

            </tr>`;
            $("#gallery").append(temp_html);
        });
    });
}

// slider
const slider = () => {
    $("#slider").empty();
    const controller = "http://127.0.0.1:7452/slider/list";
    const filter = {};
    $.getJSON(controller, filter, (result) => {
        console.log(result);
        let temp_html = "";
        $.each(result, (index, val) => {
            temp_html = `<tr>
                <td>${val.id}</td>
                <td>${val.title}</td>
                <td>${val.description}</td>
                <td><img src="${pathUrl}${val.image_path}" alt="${val.title}" width="100" height="100" /></td>

                <td>${val.button_link}</td>
                <td>${val.other_link}</td>
                <td><i class="fa p-cursor fa-${val.status ? 'toggle-on' : 'toggle-off'}" onclick="changeStatus(${val.id}, ${val.status}, ${index},'slider')"></i></td>
                
                <td><i class="fa fa-trash p-cursor" onclick="removeRecord(${val.id}, ${val.is_trash}, ${index},'slider')"></i></td>

            </tr>`;
            $("#slider").append(temp_html);
        });
    });
}

// blog
const blog = () => {
    $("#blog").empty();

    const controller = "http://127.0.0.1:7452/blog/list";
    const filter = {};
    $.getJSON(controller, filter, (result) => {
        console.log(result);
        let temp_html = "";
        $.each(result, (index, val) => {
            temp_html = `<tr>
                <td>${val.id}</td>
                <td>${val.title}</td>
                <td>${val.category}</td>
                <td>${val.date_time}</td>


                <td>${val.last_update}</td>
                <td><img src="${pathUrl}${val.image_path}" alt="${val.title}" width="100" height="100" /></td>


                <td>${val.author_id}</td>
                <td>${val.author_name}</td>
                <td>${val.slug}</td>


                <td><i class="fa p-cursor fa-${val.status ? 'toggle-on' : 'toggle-off'}" onclick="changeStatus(${val.id}, ${val.status}, ${index},'blog')"></i></td>
                
                <td><i class="fa fa-trash p-cursor" onclick="removeRecord(${val.id}, ${val.is_trash}, ${index},'blog')"></i></td>

            </tr>`;
            // category,date_time,last_update,image_path,author_id,author_name,slug

            $("#blog").append(temp_html);
        });
    });
}

// blog_comments

const blog_comments = () => {
    $("#blog_comments").empty();
    const controller = "http://127.0.0.1:7452/blog_comments/list";
    const filter = {};
    $.getJSON(controller, filter, (result) => {
        let temp_html = "";
        $.each(result, (index, val) => {
            temp_html = `<tr>
                <td>${val.id}</td>
                <td>${val.title}</td>
                <td>${val.slug}</td>
                <td>${val.visitor_name}</td>
                <td>${val.visitor_email}</td>
                <td>${val.comment}</td>
                <td>${val.date_time}</td>
                <td>
                    <button class="btn btn-${val.status ? 'warning' : 'success'}" onclick="changeStatus(${val.id}, ${val.status}, ${index},'blog_comments')" >
                    ${val.status ? 'Reject!' : 'Approve'}</button>
                <button class="btn btn-danger" onclick="removeRecord(${val.id}, ${val.is_trash}, ${index},'blog_comments')" >Delete</button>
                </td>
            </tr>`;

            $("#blog_comments").append(temp_html);
        });
    });
}



$(document).ready(function () {
    who_are_we('', '', '', '');
    our_values();
    clients();
    recent_posts();
    contact_us();
    contact_us_details();
    team();
    testimonials();
    services();
    pricing();
    faq();
    organization();
    notice();
    gallery();
    slider();
    blog();
    blog_comments();

});


const sendMail = (first_name, email_id, mail_body, subject_text) => {
    const controller = "http://localhost:7224/users/create";
    const body = {
        first_name: first_name,
        email_id: email_id,
        mail_body: mail_body,
        subject_text: subject_text
    };
    $.post(controller, body, (result) => {
        console.log(result);

    }, "JSON")
}


// const insertdemo = (body) => {
//     const controller = "http://localhost:7224/who_are_we/add";
//     $.post(controller, body, (result) => {
//         console.log(result);
//     }, "JSON")
// }


$("#btn_id").on("click", (e) => {
    e.preventDefault();
    // Take Values from inputs

    const inputbox = $("#input_box_id").val();
    const textareabox = $("#textarea_box_id").val();
    const selectbox = $("#select_box_id").val();
    const radiobox = $("input[type=radio][name=gender]").val();
    let checkbox = [];
    if ($("input[type=checkbox]#hobby1").is(":checked"))
        checkbox.push($("input[type=checkbox]#hobby1").val())
    if ($("input[type=checkbox]#hobby2").is(":checked"))
        checkbox.push($("input[type=checkbox]#hobby2").val())

    const body = {
        inputbox: inputbox,
        textareabox: textareabox,
        selectbox: selectbox,
        radiobox: radiobox,
        checkbox: checkbox,
    }
    insertdemo(body)
})