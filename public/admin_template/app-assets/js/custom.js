$(document).ready(function(){


        //Update Admin Status
        $(document).on("click", ".updateAdminStatus", function () {
            var status = $(this).children("label").attr("status");
            var admin_id = $(this).attr("admin_id");
           //alert(admin_id);
            $.ajax({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                },
                type: "post",
                url: "admin/update-admin-status",
                data: { status: status, admin_id: admin_id },
                success: function (resp) {
                    //alert(resp);
                    if (resp["status"] == 'Inactive') {
                        $("#admin-" + admin_id).html(
                            "<label class='badge badge-danger' status='Inactive'>Inactive</label>"
                        );
                    } else if (resp["status"] == 'Active') {
                        $("#admin-" + admin_id).html(
                            "<label class='badge badge-success' status='Active'>Active</label>"
                        );
                    }
                },
                error: function () {
                    alert("Error");
                },
            });
        });
})