// global function
var CrmApp = {
    getCsrfToken: function() {
        return jQuery('meta[name="csrf-token"]').attr('content');
    },
    getUserNotifications: function () {
        jQuery.ajax({
            url: "/book/notification",
            method: "GET",
            data: {
                //
            },
            success: function (response) {
                localStorage.setItem("notifications", JSON.stringify(response.data));
                CrmApp.showNotifications();
            },
        });
    },
    showNotifications: function () {
        let notifications = JSON.parse(localStorage.getItem("notifications"));
        let html = "";

        if (notifications.length > 0) {
            jQuery("#notification-count").html(notifications.length);
            jQuery.each(notifications, function (key, notification) {
                html += "\
                    <li class=\"notification-item\">\
                        <i class=\"bi bi-info-circle text-info\"></i>\
                        <div>\
                            <h4>" + notification.name + "</h4>\
                            <p>TMT Golongan: " + notification.tmt_golongan + "</p>\
                            <p>TMT Eselon: " + notification.tmt_eselon + "</p>\
                        </div>\
                    </li>\
                    <li>\
                        <hr class=\"dropdown-divider\">\
                    </li>\
                ";
            });
            jQuery("ul.notifications").append(html);
        } else {
            //
        }
    },
    buttonDelete: function (el) {
        let endpoint = jQuery(el).data("url");
        let title = jQuery(el).data("text");

        Swal.fire({
            title: "Are you sure?",
            html: "You are trying to delete <strong>\"" + title + "\"</strong>.<br> This action cannot be undone.",
            icon: "warning",
            showLoaderOnConfirm: true,
            showCancelButton: true,
            showCloseButton: true,
            reverseButtons: true,
            backdrop: true,
            confirmButtonText: "Yes, delete it!",
            customClass: {
                confirmButton: "btn btn-danger",
                cancelButton: "btn btn-primary"
            },
            preConfirm: () => {
                
                return new Promise(function(resolve) {
                    jQuery.ajax({
                        type: "POST",
                        url: endpoint,
                        data: {
                            _token: CrmApp.getCsrfToken(),
                            _method: "DELETE"
                        },
                        dataType: "JSON",
                    })
                    .done(function(response) {
                        Swal.fire("Deleted!", "Your file has been deleted.", "success");
                        // table.ajax.reload();
                        location.reload();
                    })
                    .fail(function() {
                        Swal.fire("Oops...", "Something went wrong with ajax !", "error");
                    });
                });
            },
            allowOutsideClick: () => !Swal.isLoading()
        }).then((result) => {
            //
        });
    },
    init: function () {
        CrmApp.getUserNotifications();

        jQuery(document).on("click", ".btn-action.delete", function() {
            let el = jQuery(this);
            CrmApp.buttonDelete(el);
        });
    }
};

jQuery(document).ready(function () {
    
    CrmApp.init();
});