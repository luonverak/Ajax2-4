<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="container-fluid bg-dark float-end p-3">
        <h1 class="text-light" >Product CRUD</h1>
        <button id="openAdd" type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#myModal">
        <i class="fa-solid fa-plus"></i> Add Product
        </button>
    </div>
    <table class="table table-hover align-middle" style="table-layout: fixed;" >
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Qty</th>
                <th>Price</th>
                <th>Thumbnail</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
                include('con.php');
                $sql = "SELECT * FROM `product`";
                $rs  = $connection->query($sql);
                while($row=mysqli_fetch_assoc($rs)){
                    echo '
                        <tr>
                            <td>'.$row['id'].'</td>
                            <td>'.$row['name'].'</td>
                            <td>'.$row['qty'].'</td>
                            <td>'.$row['price'].'</td>
                            <td>
                                <img src="images/'.$row['thumbnail'].'" width="120" height="120" style="object-fit: cover;" alt="'.$row['thumbnail'].'">
                            </td>
                            <td>
                                <button id="openUpdate" class="btn btn-success" type="button " data-bs-toggle="modal" data-bs-target="#myModal"><i class="fa-solid fa-pen-to-square"></i> Update</button>
                                <button id="openDelete" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal" type="button "><i class="fa-solid fa-trash"></i> Delete</button>
                            </td>
                        </tr>
                    ';
                }
            ?>

        </tbody>
    </table>
    <!-- The Modal for Delete -->
    <div class="modal" id="deleteModal">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Are you sur for delete?</h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <!-- Modal body -->
        <div class="modal-body">
            <form action="" method="post">
                <button id="accept_delete" type="button" class="btn btn-primary" data-bs-dismiss="modal">Yes,Delete it.</button>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
            </form>
        </div>
        </div>
    </div>
    </div>
    <!-- The Modal for Add -->
    <div class="modal" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">
        <!-- Modal Header -->
        <div class="modal-header">
            <h4 id="txt" class="modal-title">Modal Heading</h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <!-- Modal body -->
        <div class="modal-body">
            <form action="" method="post" enctype="multipart/form-data" >
                <label for="">Product Name</label>
                <input type="text" name="pro_name" id="pro_name" class="form-control mb-3" >
                <label for="">Product Qty</label>
                <input type="text" name="pro_qty" id="pro_qty" class="form-control mb-3" >
                <label for="">Product Price</label>
                <input type="text" name="pro_price" id="pro_price" class="form-control mb-3" >
                <label for="">Product Thumbnail</label>
                <input type="file" name="thumbnail" id="thumbnail" class="form-control d-none mb-3" alt="" > <br>
                <img id="openImage" src="images/upload.webp" width="120" height="120" style="object-fit: cover;" alt="images/upload.webp">
                <!-- Hiddel Image -->
                <input type="hidden" name="" id="hide_image">
                <!-- Hidden Id -->
                <input type="hidden" name="" id="pro_id">
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button id="btnSave" type="button" class="btn btn-primary" data-bs-dismiss="modal">Save</button>
                    <button id="btnUpdate" type="button" class="btn btn-success" data-bs-dismiss="modal">Update</button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
        </div>
    </div>
    </div>
</body>
<script>
    $(document).ready(function(){

        $("#openAdd").click(function(){
            //clear field
            $("#pro_name").val("");
            $("#pro_qty").val("");
            $("#pro_price").val("");
            $("#openImage").attr("src","images/upload.webp");

            $("#btnSave").show();
            $("#btnUpdate").hide();
            // choose image
            $("#openImage").click(function(){
                $("#thumbnail").click();
            })
            $("#thumbnail").change(function(){
                var form_data =new FormData();
                var file = $("#thumbnail")[0].files;
                form_data.append('thumbnail',file[0]);
                $.ajax({
                    url : 'move_image.php',
                    method : 'post',
                    data:form_data,
                    cache :false,
                    contentType :false,
                    processData :false,
                    success:function(respone){
                        $("#openImage").attr('src','images/'+respone);
                        $("#hide_image").val(respone);
                    }
                })
            })
            // change form title
            $("#txt").text("Enter product information");
            // get data from form
            $("#btnSave").click(function(){
                var name = $("#pro_name").val();
                var qty  = $("#pro_qty").val();
                var price= $("#pro_price").val();
                var image= $("#hide_image").val();
                $.ajax({
                    url : 'insert.php',
                    method : 'post',
                    data:{
                        pro_name:name,
                        pro_qty: qty,
                        pro_price:price,
                        pro_image:image
                    },
                    cache:false,
                    success:function(respone){
                        var data=`
                                <tr>
                                    <td>${respone}</td>
                                    <td>${name}</td>
                                    <td>${qty}</td>
                                    <td>${price}</td>
                                    <td>
                                        <img src="images/${image}" width="120" height="120" style="object-fit: cover;" alt="">
                                    </td>
                                    <td>
                                        <button id="openUpdate" class="btn btn-success" type="button " data-bs-toggle="modal" data-bs-target="#myModal"><i class="fa-solid fa-pen-to-square"></i> Update</button>
                                        <button class="btn btn-danger" type="button "><i class="fa-solid fa-trash"></i> Delete</button>
                                    </td>
                                </tr>
                        `;
                        $('tbody').append(data);
                    }
                })
            })

        })
        //update
        var row='';
        var rowIndex='';
        $("body").on('click','#openUpdate',function(){
            $("#btnSave").hide();
            $("#btnUpdate").show();
            // Get data from table
            var id    = $(this).parents('tr').find('td').eq(0).text();
            var name  = $(this).parents('tr').find('td').eq(1).text();
            var qty   = $(this).parents('tr').find('td').eq(2).text();
            var price = $(this).parents('tr').find('td').eq(3).text();
            var _image = $(this).parents('tr').find('td:eq(4) img').attr('alt');
            // set in to form
            $("#pro_id").val(id);
            $("#pro_name").val(name);
            $("#pro_qty").val(qty);
            $("#pro_price").val(price);
            $("#hide_image").val(_image);
            $("#openImage").attr('src','images/'+_image);
            rowIndex=$(this).parents('tr').index();
            $("#btnUpdate").click(function(){
                // get data from form
                row = $('body').find('tbody').find('tr');
                var name = $("#pro_name").val();
                var qty  = $("#pro_qty").val();
                var price= $("#pro_price").val();
                var image= $("#hide_image").val();
                var id = $("#pro_id").val();
                console.log(image);
                $.ajax({
                    url : 'update.php',
                    method:'post',
                    data:{
                        pro_id : id,
                        pro_name:name,
                        pro_qty: qty,
                        pro_price:price,
                        pro_image:image
                    },
                    cache:false,
                    success:function(respone){
                        if(respone=='success'){
                                var data=`
                                    <td>${id}</td>
                                    <td>${name}</td>
                                    <td>${qty}</td>
                                    <td>${price}</td>
                                    <td>
                                         <img src="images/${image}" width="120" height="120" style="object-fit: cover;" alt="${image}">
                                    </td>
                                    <td>
                                        <button id="openUpdate" class="btn btn-success" type="button " data-bs-toggle="modal" data-bs-target="#myModal"><i class="fa-solid fa-pen-to-square"></i> Update</button>
                                        <button class="btn btn-danger" type="button "><i class="fa-solid fa-trash"></i> Delete</button>
                                    </td>
                            `;
                            row.eq(rowIndex).html(data);
                        }


                    }
                })
            })

        })
        //delete
        $("body").on('click','#openDelete',function(){
            var id = $(this).parents('tr').find('td').eq(0).text();
            rowIndex=$(this).parents('tr').index();
            $("#accept_delete").click(function(){
                row = $('body').find('tbody').find('tr');
                row.eq(rowIndex).remove();
                $.ajax({
                    url : 'delete.php',
                    method : 'post',
                    data:{
                        delete_id:id
                    },
                    cache:false,
                    success:function(respone){
                        if(respone=='success')
                        swal({
                            title: "Good job!",
                            text: "You clicked the button!",
                            icon: "success",
                            button: "Aww yiss!",
                        });
                    }
                })
            })
        })
    })
</script>
</html>