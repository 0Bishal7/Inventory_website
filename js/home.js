const slider = () => {
    $("#slider").empty();
    const controller = "http://127.0.0.1:7452/slider/list";
    const filter = {};
    $.getJSON(controller, filter, (result) => {
        var count = 1;
        $.each(result, (index, val) => {
            if(val.status == 1){
                $("#slider").append(`<div class="row gy-4" >
                    <div class="col-lg-6 order-2 order-lg-${count++%2 == 0?2:1} d-flex flex-column justify-content-center">
                <h1 data-aos="fade-up">${val.title}</h1>
                <p data-aos="fade-up" data-aos-delay="100">${val.description}</p>
                <div class="d-flex flex-column flex-md-row" data-aos="fade-up" data-aos-delay="200">
                  <a href="${val.button_link}" class="btn-get-started">Get Started <i class="bi bi-arrow-right"></i></a>
                  <a href="${val.other_link}"
                    class="glightbox btn-watch-video d-flex align-items-center justify-content-center ms-0 ms-md-4 mt-4 mt-md-0"><i
                      class="bi bi-play-circle"></i><span>Watch Video</span></a>
                </div>
              </div>
              <div class="col-lg-6 order-1 order-lg-${count%2 == 0?2:1} hero-img" data-aos="zoom-out">
                <img src="${val.image_path}" class="img-fluid animated" alt="${val.title}">
              </div></div>`);
            }
        });
    });
}
const who_are_we = () => {
    $("#who_are_we").empty();
    const controller = "http://127.0.0.1:7452/who_are_we/list";
    const filter = {};
    var count = 1;
    $.getJSON(controller, filter, (result) => {
        console.log(result)
        $.each(result, (index, val) => {
            if(val.status == 1){
            $("#who_are_we").append(`
                <div class="row gx-0" >
                <div class="col-lg-6 order-2 order-lg-${count++%2 == 0?2:1} d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="200">
                <div class="content">
                <h3>Who We Are</h3>
                <h2>${val.title} status ${val.status} + ${val.id}</h2>
                <p>${val.description}</p>
                <div class="text-center text-lg-start">
                <a href="#" class="btn-read-more d-inline-flex align-items-center justify-content-center align-self-center">
                <span>Read More</span>
                <i class="bi bi-arrow-right"></i>
                </a>
                </div>
                </div>
                </div>
                <div class="col-lg-6 order-1 order-lg-${count%2 == 0?2:1} d-flex align-items-center" data-aos="zoom-out" data-aos-delay="200">
                <img src="${val.image_path}" class="img-fluid" alt="">
                </div></div>`);
            }
        });
    });
}

  const services = () => {

    $("#services_data").empty();
    const controller = "http://127.0.0.1:7452/services/list";
    const filter = {};
    $.getJSON(controller, filter, (result) => {
        let temp_html = "";
        $.each(result, (index, val) => {
            if(val.status == 1){
                $("#services_data").append(`
                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="600">
                    <div class="service-item item-pink position-relative">
                    <i class="${val.icon}"></i>
                    <h3>${val.title}</h3>
                    <p>${val.description}</p>
                    <a href="${val.external_link}" class="read-more stretched-link"><span>Read More</span> <i class="bi bi-arrow-right"></i></a>
                    </div>
                    </div>`);
            }
        });
    });
}


// F.A.Q
const faq = () => {
    $("#faq_data").empty();

    const controller = "http://127.0.0.1:7452/faq/list";
    const filter = {};
    $.getJSON(controller, filter, (result) => {
        $.each(result, (index, val) => {
            if(val.status == 1){ 
                $("#faq_data").append(`
<div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">

<div class="faq-item" onclick="faqOpen(this)" >
    <h3>${val.question}</h3>
    <div class="faq-content">
    <p>${val.answer}</p>
</div>
<i class="faq-toggle bi bi-chevron-right"></i>

</div>
</div>`);
            } 
        });
    });
}
// testimonials
const testimonials = () => {
    $("#testimonials_desc").empty();

    const controller = "http://127.0.0.1:7452/testimonials/list";
    const filter = {};
    $.getJSON(controller, filter, (result) => {
        $.each(result, (index, val) => {
            if(val.status == 1){
                $("#testimonials_desc").append(`
                    <div class="swiper-slide ${index==0?'swiper-slide-active':''}">
          <div class="testimonial-item">
            <div class="stars">
              <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
            </div>
            <p>
            ${val.description}
            </p>
            <div class="profile mt-auto">
              <img src="${val.image_path}" class="testimonial-img" alt="${val.Name}">
              <h3>${val.Name}</h3>
              <h4>${val.job_title}</h4>
            </div>
          </div>
        </div>`);
        } 
    });
});
}

// TEAM

const team = () => {
    $("#team_data").empty();

    const controller = "http://127.0.0.1:7452/team/list";
    const filter = {};
    $.getJSON(controller, filter, (result) => {
        $.each(result, (index, val) => {
            if(val.status == 1){
            $("#team_data").append(`
                <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
        <div class="team-member" >
          <div class="member-img">
            <img src="${val.image_path}" class="img-fluid" alt="">
            <div class="social">
              <a href="${val.Twitter_link}"><i class="bi bi-twitter-x"></i></a>
                  <a href="${val.Facebook_link}"><i class="bi bi-facebook"></i></a>
                  <a href="${val.instagram_link}"><i class="bi bi-instagram"></i></a>
                  <a href="${val.Linkdin_link}</"><i class="bi bi-linkedin"></i></a>
            </div>
          </div>
          <div class="member-info">
            <h4>${val.Name}</h4>
                <span>${val.job_Title}</span>
                <p>${val.Description}</p>
          </div>
        </div>
      </div>`);
            }
        });
    });
}


const clients = () => {
    $("#clients_list").empty();

    const controller = "http://127.0.0.1:7452/clients/list";
    const filter = {};
    $.getJSON(controller, filter, (result) => {
          
        $.each(result, (index, val) => {
            if(val.status == 1){
                $("#clients_list").append( `<div class="swiper-slide"><img src="${val.image_path}" class="img-fluid"
                alt=""></div>`);
            }
        });
    });
}





const recent_posts = () => {
    $("#recent_postss").empty();
    const controller = "http://127.0.0.1:7452/blog/list";
    const filter = {};
    var count = 0
    $.getJSON(controller, filter, (result) => {
        $.each(result, (index, val) => {
            if(count < 3 ){
                if(val.status == 1){
                    $("#recent_postss").append(`<div class="col-xl-4 col-md-6">
                       <div class="post-item position-relative h-100" data-aos="fade-up" data-aos-delay="${(index + 1) * 100}">
                           <div class="post-img position-relative overflow-hidden">
                               <img src="${val.image_path}" class="img-fluid" alt="${val.title}">
                               <span class="post-date">${val.post_date}</span>
                           </div>
                           <div class="post-content d-flex flex-column">
                               <h3 class="post-title">${val.title}</h3>
                               <div class="meta d-flex align-items-center">
                                   <div class="d-flex align-items-center">
                                       <i class="bi bi-person"></i> <span class="ps-2">${val.author}</span>
                                   </div>
                                   <span class="px-3 text-black-50">/</span>
                                   <div class="d-flex align-items-center">
                                       <i class="bi bi-folder2"></i> <span class="ps-2">${val.category}</span>
                                   </div>
                               </div>
                               <hr>
                               <a href="${val.read_more_link}" class="readmore stretched-link">
                                   <span>Read More</span><i class="bi bi-arrow-right"></i>
                               </a>
                           </div>
                       </div>
                   </div>`);
                count++;
               }
            }
        });
    });
}










$(document).ready(function () {
    slider();
    who_are_we();
    // our_values();
    clients();
    recent_posts();
    // contact_us();
    // contact_us_details();
    team();
    testimonials();
    services();
    // pricing();
    faq();
    // organization();
    // notice();
    // gallery();
    // blog();
    // blog_comments();
});
   /**
   * Custom Frequently Asked Questions Toggle
   */
   function faqOpen(e){
    if($(e).hasClass('faq-active'))
        $(e).removeClass('faq-active')
    else
        $(e).addClass('faq-active')
}