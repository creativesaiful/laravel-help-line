
<!-- Footer Link -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.25.0/axios.min.js" integrity="sha512-/Q6t3CASm04EliI1QyIDAA/nDo9R8FQ/BULoUFyN4n/BDdyIxeH7u++Z+eobdmr11gG5D/6nPFyDlnisDwhpYA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>



<script type="text/javascript">
	//To get services data from database
function getServiceData() {
    axios.get('/getServicesData')
        .then(function (response) {

            if (response.status == 200) {
                $('#ServiceSection').removeClass('d-none');
                $('#LoaderService').addClass('d-none');


                // Destroy data table before loading
                $('#serviceTable').DataTable().destroy();

                // empty service table befor load
                $('#service_table').empty();




                var jsonData = response.data;

                $.each(jsonData, function (i, item) {

                    $('<tr>').html(
                        "<td> <img src='" + jsonData[i].service_img + "' width='60px'> </td>" +
                        "<td>" + jsonData[i].service_name + "</td>" +
                        "<td>  " + jsonData[i].service_des + " </td>" +
                        "<td> <a class='serviceeditbtn' data-id='" + jsonData[i].id + "'> <i class='fas fa-edit'></i> </a>  </td>" +
                        "<td> <a class='servicedeletebtn' data-id='" + jsonData[i].id + "'> <i class='fas fa-trash-alt'> </i>  </a> </td>"
                    ).appendTo('#service_table');
                });


                //service  delete icon cick action

                $('.servicedeletebtn').click(function () {
                    var id = $(this).data('id');

                    $('#deleteid').html(id);
                    $('#deleteModal').modal('show');
                })






                //service  Edit icon cick action

                $('.serviceeditbtn').click(function () {
                    var id = $(this).data('id');

                    $('#editid').html(id);
                    $('#editModal').modal('show');

                    getSingleService(id);
                })


                // Add data table method
                $('#serviceTable').DataTable({ 'order': false });
                $('.datatables_length').addClass('bs-select');








            } else {
                $('#LoaderService').addClass('d-none');
                $('#WrongService').removeClass('d-none');
            }


        }).catch(function (error) {

        })
}


//Service delete confirm buttom action

$('#deleteConfirmBtn').click(function () {
    var id = $('#deleteid').html();


    deleteService(id);
    $('#deleteConfirmBtn').html("<div class='spinner-border' role='status'>  </div>");
})

//delete service
function deleteService(deleteId) {
    axios.post('/deleteServicesData', { id: deleteId })
        .then(function (response) {

            var id = $('#deleteid').html("");

            if (response.data == 1) {

                $('#deleteConfirmBtn').html("Delete");
                $('#deleteModal').modal('hide');
                toastr.success("data deleted");
                getServiceData();
            } else {

                $('#deleteModal').modal('hide');
                toastr.error("Fail to delete data");
                getServiceData();
            }


        }).catch(function (error) {

        })
}




//Single service details for edit


function getSingleService(detaisId) {
    axios.post('/editservice', { id: detaisId })
        .then(function (response) {

            var singleServiceData = response.data;

            if (response.status == 200) {

                $('#editserviceId').val(singleServiceData[0].id);
                $('#editImgLink').val(singleServiceData[0].service_img);
                $('#editSeriviceName').val(singleServiceData[0].service_name);
                $('#editServiceDes').val(singleServiceData[0].service_des);
            }




        }).catch(function (error) {

        })
}


//Service update confirm buttom action

$('#serviceUpdatConfirBtn').click(function () {
    var id = $('#editserviceId').val();
    var serviceImg = $('#editImgLink').val();
    var serviceName = $('#editSeriviceName').val();
    var ServiceDes = $('#editServiceDes').val();



    updateService(id, serviceImg, serviceName, ServiceDes);
})


//service update

function updateService(updateid, serviceImg, serviceName, serviceDes) {

    if (serviceImg.length == 0) {
        toastr.error("Image not found");
    } else if (serviceName == 0) {
        toastr.error("Name should not be empty");
    } else if (serviceDes == 0) {
        toastr.error("Description should not be empty");
    } else {

        $('#serviceUpdatConfirBtn').html("<div class='spinner-border' role='status'>    </div>")
        axios.post('/updateservice', { id: updateid, service_img: serviceImg, service_name: serviceName, service_des: serviceDes })
            .then(function (response) {

                if (response.status == 200) {

                    if (response.data == 1) {
                        toastr.success("data Updated successfully");
                        $('#editModal').modal('hide');
                        getServiceData();
                        $('#serviceUpdatConfirBtn').html('Update');
                    } else {
                        toastr.error("Update Failed");
                        $('#editModal').modal('hide');
                        $('#serviceUpdatConfirBtn').html('Update');
                        getServiceData();
                    }




                } else {
                    toastr.error("Somthing went wrong");
                    $('#editModal').modal('hide');
                }
            }).catch(function (error) {

            })
    }

}



//add service


$('#addServicebtn').click(function () {
    $('#addModal').modal('show');


    $("#addServiceConfirmBtn").click(function () {
        var addServiceName = $('#AddSeriviceName').val();
        var addServiceDes = $('#AddServiceDes').val();
        var addServiceImg = $('#addImageLink').val();


        addService(addServiceName, addServiceDes, addServiceImg)


    })

})


function addService(addServiceName, addServiceDes, addServiceImg) {

    if (addServiceName.length == 0) {
        toastr.error("Name should not be empty");
    } else if (addServiceDes.length == 0) {
        toastr.error("Description should not be empty");
    } else if (addServiceImg.length == 0) {
        toastr.error("Img link should not be empty");
    } else {
        axios.post('/addservice', { service_name: addServiceName, service_des: addServiceDes, service_img: addServiceImg })
            .then(function (response) {
                $('#addServiceConfirmBtn').html("<div class='spinner-border' role='status'>  </div>");

                if (response.status == 200) {

                    if (response.data == 1) {

                        toastr.success("data added successfully");
                        $('#addModal').modal('hide');
                        getServiceData();
                        $('#addServiceConfirmBtn').html('Add');

                    } else {

                        toastr.error("add Failed");
                        $('#addModal').modal('hide');
                        getServiceData();
                        $('#addServiceConfirmBtn').html('Add');

                    }

                } else {
                    toastr.error("Somthing went wrong");
                    $('#editModal').modal('hide');
                }
            }).catch(function (error) {

            })
    }

}

</script>










