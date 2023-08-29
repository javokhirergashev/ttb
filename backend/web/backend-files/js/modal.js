document.addEventListener("DOMContentLoaded", function () {
    // Retrieve active tab from Local Storage
    const activeTab = localStorage.getItem("activeTab");
    if (activeTab) {
        let links = document.querySelectorAll('.active');
        links.forEach((item) => {
            item.classList.remove("active");
        })


        let element = document.querySelectorAll(`a[data-href="${activeTab}"]`);
        let tabElement = element[0]
        if (tabElement) {
            tabElement.classList.add("active");
            const tabContentId = tabElement.getAttribute("href");
            document.querySelector(tabContentId).classList.add("show", "active");
        }
    } else {
        let element = document.querySelector(`a[data-href="#about-cont"]`);
        console.log(element)
        if (element) {
            tabElement.classList.add("active");
            const tabContentId = element.getAttribute("href");
            document.querySelector(tabContentId).classList.add("show", "active");
        }
    }

    // Listen for tab clicks
    const tabLinks = document.querySelectorAll(".nav-link");
    tabLinks.forEach((link) => {
        link.addEventListener("click", function () {
            let href = link.attributes.href.nodeValue;
            if (href.length > 2) {
                localStorage.setItem("activeTab", href);
            }
        });
    });
});


$('#form-modal-submit').on('click', function (e) {

    $('#modal-form').submit();

})

$('#form-modal-cancel').on('click', function (e) {
    $('#cancel-form').submit();
})

$(document).ready(function () {

    $('.open-modal-class').on('click', function (e) {
        let id = $(this).attr('data-value')
        $('#history-queue_id').val(id)
    })


    $('.cancel-button').on('click', function (e) {
        let id = $(this).attr('data-value')
        $('#hidden-cancel-id').val(id)
    })

})


