@extends('adminLayout.layout')
@section('content')
<!-- css -->
<style>

 

a.delBtn {
    color: chocolate;
}
a.delBtn:hover {
    color: #4e781f;
}

.toggle {
    appearance: none;
    position: relative;
    cursor: pointer;
    width: 80%;
    height: 47px;
    /* box-shadow: -4px -4px 8px rgb(255 255 255 / 50%), 4px 4px 8px rgb(0 0 0 / 30%); */
    /* border-radius: 8px; */
}
.toggle::before, .toggle::after {
    font-family: "Nunito", sans-serif;
    font-size: 16px;
    text-align: center;
    line-height: 29px;
    position: absolute;
    width: 80.5px;
    height: 33px;
    border-radius: 4px;
    top: 7px;
    transition: all 0.15s;
    padding: 3px;
}
.toggle::before {
    content: "List";
    left: 15px;
    color: #d74141;
    box-shadow: 0px 0px 7px 0px #b38d8d;
}
.toggle::after {
    content: "Colour";
    left: 53%;
    color: #b2b2ad;
    box-shadow: none;
}
.toggle:checked::before {
  color: #b2b2ad;
  box-shadow: none;
}
.toggle:checked::after {
    color: #2cb4b2;
    box-shadow: 0px 0px 8px 0px #8dc6c4;
}

 .btn-group, .btn-group-vertical {
    width: 100%;
    height: 60%;
    position: relative;
    display: -ms-inline-flexbox;
    display: inline-flex;
    vertical-align: middle;
}
.variantModalBody {
    width: 127%!important;
    right: 12%!important;
}
.select2-container {
    box-sizing: border-box;
    display: inline-block;
    margin: 0;
    position: relative;
    vertical-align: middle;
    width: 100%!important;
}
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
 <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <!-- END GLOBAL MANDATORY STYLES -->

    <!-- BEGIN PAGE LEVEL STYLES -->
    <link href="{{asset('project/public/admin/assets/css/scrollspyNav.css')}}" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" type="text/css" href="{{asset('project/public/admin/plugins/bootstrap-select/bootstrap-select.min.css')}}">

    <link href="{{asset('project/public/admin/plugins/file-upload/file-upload-with-preview.min.css')}}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{asset('project/public/admin/assets/css/forms/switches.css')}}">
    <link rel="stylesheet" href="{{asset('project/public/admin/plugins/editors/markdown/simplemde.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('project/public/admin/assets/css/forms/theme-checkbox-radio.css')}}">
            <link href="{{asset('project/public/admin/assets/css/components/custom-list-group.css')}}" rel="stylesheet" type="text/css">

        <link rel="stylesheet" href="{{asset('project/public/admin/plugins/font-icons/fontawesome/css/regular.css')}}">
    <link rel="stylesheet" href="{{asset('project/public/admin/plugins/font-icons/fontawesome/css/fontawesome.css')}}">
    <link rel="stylesheet" href="{{asset('project/public/admin/plugins//editors/quill/quill.snow.css')}}">
    <link rel="stylesheet" href="{{asset('project/public/admin/plugins/select2/select2.min.css')}}">
  
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
 
 <link rel="stylesheet" href="{{asset('project/public/admin/assets/css/custom-modal.css')}}">
<!--end-->

    <script src="{{asset('project/public/admin/assets/js/libs/jquery-3.1.1.min.js')}}"></script>

<!--  BEGIN CONTENT AREA  -->
 <div id="content" class="main-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-10">
                         <div class="container-fluid">



                    <div class="row">
                        <div class="col-xl-8 col-lg-8 col-12">
                        <form action="{{route('saveNewProduct')}}" name="product_form" id="product_form" method="post" encrypt="multipart/form-data">
                      
                     <div class="row">
                        <div id="fuMultipleFile" class="col-lg-12 layout-spacing layout-top-spacing">
                            <div class="statbox widget box box-shadow">
                                <div class="widget-header border-bottom">
                                    <div class="row">
                                       
                                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                            <h4>Images And Videos (Multiple Files Upload)</h4>
                                        </div>                                                                        
                                    </div>
                                </div>


                                   <div class="widget-content widget-content-area">
                                    <div class="custom-file-container" data-upload-id="mySecondImage">
                                        <label>Upload (Allow Multiple) <a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image">x</a></label>
                                        <label class="custom-file-container__custom-file" >
                                            <input type="file" class="custom-file-container__custom-file__custom-file-input" name="images[]" multiple>
                                            <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
                                            <span class="custom-file-container__custom-file__custom-file-control"></span>
                                        </label>
                                        <div class="custom-file-container__image-preview"></div>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>



              
               
                    
               

                    <div class="row">
                        <div id="flFormsGrid" class="col-lg-12 layout-spacing">
                            <div class="statbox widget box box-shadow">
                                <div class="widget-header border-bottom">
                                    <div class="row">
                                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                            <h4>Basic Info</h4>
                                        </div>                                                                        
                                    </div>
                                </div>


                                <div class="widget-content widget-content-area">
                                   
                                        <div class="form-row mb-4">
                                            <div class="form-group col-md-8">
                                                <label for="">Name</label>
                                                <input type="text" class="form-control" id="" name="proName" placeholder="">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="inputPassword4">Ribbon</label>
                                                <input type="text" class="form-control" id=""  name="proRibbon" placeholder="">
                                            </div>
                                        </div>
                                         <div class="form-row mb-4">
                                            <div class="form-group col-md-6">
                                                <label for="">Category</label>
                                                <select class="form-control" id="" name="category">
                                                    <option >--- Select Category ---</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="inputPassword4">Sub Category</label>
                                                 <select class="form-control" id="" name="sub_category" >
                                                    <option >--- Select Sub category ---</option>
                                                </select>
                                            </div>
                                        </div>
                                         <div class="form-row mb-4">
                                            <div class="form-group col-md-8">
                                                <label for="">Sub Segment</label>
                                              <select class="form-control" id="" name="sub_segment" >
                                                    <option>--- Select Sub Segment ---</option>
                                                </select>
                                            </div>
                                            
                                        </div>

                                              <div class="form-row mb-4">
                                                <div class="form-group col-md-4">
                                                    <label for="">Price</label>
                                                    <input type="text" class="form-control" id="price" name="price" placeholder="">
                                                </div>
                                           
                                         </div>


                                         <div class="form-row mb-4">
                                             <div class="form-group col-md-12 d-flex" id="">
                                                 <label class="switch s-outline s-outline-primary  mb-4 mr-2">
                                                    <input type="checkbox" name="sale" id="saleCheck" >
                                                    <span class="slider round"></span>

                                                </label>
                                                <h6>On sale</h6>
                                             </div>
                                             <div id="onSale">
                                                 
                                             </div>
                                                 <div class="form-group col-md-12 d-flex">
                                                 <label class="switch s-outline s-outline-primary  mb-4 mr-2">
                                                    <input type="checkbox" id="unitCheck" name="unitCheck" >
                                                    <span class="slider round" ></span>

                                                </label>
                                                <h6>Show Unit Price</h6>
                                             </div>
                                             <div id="UnitPrice">
                                                 
                                             </div>
        

                                             <div class="form-group col-md-12">
                                                 <label for="">Description</label>
                                                  <textarea id="description_text" name="description"></textarea>
                                             </div>
                                         </div>

                                         <div class="form-row">
                                          
                                             <div class="form-group col-md-12">
                                                 <h5>Additional Info Section</h5>
                                                 <p id="add_other_des">Share the information like return policy and care instructions for our customers.</p>
                                    
                                                 <span  class="btn btn-warning mb-2 mr-2" data-toggle="modal" data-target="#additional_info">+ Add Another Section</span>
                                             </div>
                                         </div>
                                  
                                </div>
                            </div>
                        </div>
                    </div>



                     <div class="row">
                        <div id="flFormsGrid" class="col-lg-12 layout-spacing">
                            <div class="statbox widget box box-shadow">
                                <div class="widget-header border-bottom">
                                    <div class="row">
                                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                            <h4> Custom Text</h4>
                                         
                                        </div> 

                                                                                                             
                                    </div>

                                </div>


                                    <div class="widget-content widget-content-area">
                                              <p class="mb-3">Allow customer to personalize the product with a custom text field.</p>
                                              <div id="CustomTextField">
                                                  
                                              </div>
                                             <span class="btn btn-primary mb-2" id="addCustomTextField"> Add Custom Text Field </span>
                                    </div>
                                
                            </div>
                        </div>
                    </div>



                     <div class="row">
                        <div id="flFormsGrid" class="col-lg-12 layout-spacing">
                            <div class="statbox widget box box-shadow">
                                <div class="widget-header border-bottom">
                                    <div class="row">
                                        <div class=" col-md-12  col-12">
                                            <div class=" d-flex justify-content-between align-items-center">
                                                
                                           
                                            <div>
                                                  <h4> Product Options </h4>
                                                    <p class="px-3">Manage the options with product</p>
                                            </div>
                                            <div class="pr-3">
                                                <h5><a href="javascript:void(0)" class="text-primary" onclick="connectImgModal()"> <i class="far fa-image"></i> Connect Images | <i class="fa fa-cogs"></i> </a></h5>
                                            </div>
                                          
                                         
                                        </div> 
                                         </div>

                                                                                                             
                                    </div>

                                </div>


                                    <div class="widget-content widget-content-area">
                                        <div id="allVarients">
                                            
                                        </div>
        
                                    

                                            <div class="row py-3">
                                               <div class="col-lg-12 col-md-12 col-6">
                                                   <a type="button" class="btn btn-success mb-2mr-2" data-toggle="modal" data-target=".addVarientModal">+ Add Another Section </a>
                                                
                                               </div>
                                              
                                           </div>

                                           <div class="row">
                                               
                                                 <div class="form-group col-md-12 d-flex">
                                                 <label class="switch s-outline s-outline-primary  mb-4 mr-2">
                                                    <input type="checkbox" id="variantPrice">
                                                    <span class="slider round"></span>

                                                </label>
                                                <h6>Manage pricing and inventory for variants</h6>
                                                  <span type="button" id="manageVariantBtn" class="btn btn-success mb-2mr-2" data-toggle="modal" data-target=".manageVarientPricing" style="display:none;">Manage Varient Price button</span>
                                             </div>
                                           </div>
                                    </div>
                                
                            </div>
                        </div>
                    </div>

                        <div id="manageVariantsDiv">
                            
                        </div>

                        <div class="row" id="manageVariantdiv" style="display:none">
                        <div id="flFormsGrid" class="col-lg-12 layout-spacing">
                            <div class="statbox widget box box-shadow">
                                <div class="widget-header border-bottom">
                                    <div class="row">
                                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                            <h4>Manage variants</h4>
                                        </div>                       
                                    </div>
                                </div>
                                <div class="widget-content widget-content-area" onclick="showVariantManagment()" style="cursor:pointer;">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover table-striped table-checkable table-highlight-head mb-4">
                                            <thead>
                                                <tr>
                                                    
                                                    <th class="">Variants</th>
                                                    <th class="">Charges (+/-)</th>
                                                    <th class="">Price</th>
                                                    <th class="text-center">Status</th>
                                                    <th class="text-center">Visibility</th>
                                                </tr>
                                            </thead>
                                            <tbody id="variantShow">
                                                <tr>
                                                    <td>
                                                        <p class="mb-0">Shaun Park</p>
                                                    </td>
                                                    <td>10/08/2020</td>
                                                    <td>320</td>
                                                    <td>320</td>

                                                    <td class="text-center">djk</td>
                                                </tr>
                                                
                                            </tbody>
                                        </table>
                                    </div>

                                    

                                </div>
                            </div>
                        </div>
                    </div>


                       <div class="row" id="inventoryDiv">
                        <div id="flFormsGrid" class="col-lg-12 layout-spacing">
                            <div class="statbox widget box box-shadow">
                                <div class="widget-header border-bottom">
                                    <div class="row">
                                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                            <h4>Inventory And Shipping</h4>
                                        </div>                                                                        
                                    </div>
                                </div>
                                <div class="widget-content widget-content-area">
                                        <div class="form-row">
                                               <div class="form-group col-md-12 d-flex">
                                                 <label class="switch s-outline s-outline-primary  mb-4 mr-2">
                                                    <input type="checkbox" value="0" id="inventryType">
                                                    <span class="slider round"></span>

                                                </label>
                                                <h6>Track Inventory</h6>
                                             </div>
                                           
                                        </div>
                                       
                                        <div class="form-row mb-4">
                                            <div class="form-group col-md-4" id="selectInventry" style="display:none">
                                                <label for="inputCity">Inventory</label>
                                                 <input type="number" class="form-control">
                                            </div>
                                            <div class="form-group col-md-4" id="selectStatus">
                                                <label for="inputCity">Status</label>
                                                 <select class="selectpicker w-100">
                                                    <option>In Stock </option>
                                                    <option>Out of stock</option>
                                                </select>
                                            </div>

                                            <div class="form-group col-md-4">
                                                <label for="inputState">SKU</label>
                                               <input type="text" class="form-control" id="">

                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="">Shipping weight</label>
                                             <div class="input-group">
                                                  <input type="text" class="form-control" placeholder="" aria-label="" aria-describedby="basic-addon2">
                                                  <div class="input-group-append">
                                                    <span class="input-group-text" id="basic-addon6">lb</span>
                                                  </div>
                                                </div>
                                            </div>
                                        </div>
                                      

                                </div>
                                
                            </div>
                        </div>
                    </div>





                       <div class="row">
                        <div id="flFormsGrid" class="col-lg-12 layout-spacing">
                            <div class="statbox widget box box-shadow">
                                <div class="widget-header">
                                    <div class="row">
                                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                            <h4>Subscriptions</h4>
                                        </div>                                                                        
                                    </div>
                                </div>
                                <div class="widget-content widget-content-area">
                                   
                                        <div class="form-row mb-4 justify-content-between">
                                            <div class="form-group col-md-6">
                                                <p>Eaisly offers your products for your recurring basis with subscription</p>
  
                                                   <span type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">+ Create a Subscription</span>

                                         
                                            </div>
                                            <div class="form-group col-md-4">
                                               <div>
                                                   <figure>
                                                       <img src="https://images-eu.ssl-images-amazon.com/images/I/31QoaNuPOXL.jpg" alt="" class="img-fluid rounded-circle" style="height: 150px; width:150px;">
                                                   </figure>
                                               </div>
                                            </div>

                                          
                                        </div>
                                       

                                </div>
                            </div>
                        </div>
                    </div>
                    
                    
                        </div>

                         <div class="col-xl-4 col-lg-4 col-12 ">
                            

                    <!-- right hand side -->

                        <div class="row">
                        <div id="flFormsGrid" class="col-lg-12 layout-spacing layout-top-spacing">
                            <div class="statbox widget box box-shadow">
                           
                                <div class="widget-content widget-content-area">
                                   
                                    <div class="form-row">
                                        <div class=" col-md-12">
                                            <div class="n-chk">
                                                <label class="new-control new-checkbox checkbox-outline-primary">
                                                  <input type="checkbox" class="new-control-input">
                                                  <span class="new-control-indicator"></span>Show in Online Store
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                   
                                </div>
                            </div>
                        </div>
                    </div>


                               <div class="row">
                        <div id="flFormsGrid" class="col-lg-12 layout-spacing">
                            <div class="statbox widget box box-shadow">
                                <div class="widget-header border-bottom">
                                    <div class="row">
                                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                            <h4>Collections</h4>
                                        </div>                                                                        
                                    </div>
                                </div>
                                <div class="widget-content widget-content-area">
                                   
                                        <div class="form-row mb-4 justify-content-between">
                                                <div class="col-lg-12">
                                                    <div class="n-chk">
                                                        <label class="new-control new-checkbox checkbox-outline-primary">
                                                          <input type="checkbox" class="new-control-input">
                                                          <span class="new-control-indicator"></span>All Product 
                                                        </label>
                                                    </div>

                                                     <div class="n-chk">
                                                        <label class="new-control new-checkbox checkbox-outline-primary">
                                                          <input type="checkbox" class="new-control-input">
                                                          <span class="new-control-indicator"></span>Men
                                                        </label>
                                                    </div>

                                                     <div class="n-chk">
                                                        <label class="new-control new-checkbox checkbox-outline-primary">
                                                          <input type="checkbox" class="new-control-input">
                                                          <span class="new-control-indicator"></span>Women
                                                        </label>
                                                    </div>

                                               
                                                </div>

                                          
                                        </div>
                                       

                                </div>
                            </div>
                        </div>
                    </div>


                      <div class="row">
                        <div id="flFormsGrid" class="col-lg-12 layout-spacing">
                            <div class="statbox widget box box-shadow">
                                <div class="widget-header border-bottom">
                                    <div class="row">
                                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                            <h4>Promote</h4>
                                        </div>                                                                        
                                    </div>
                                </div>
                                <div class="widget-content widget-content-area">
                                   
                                        <div class="form-row mb-4 justify-content-between">
                                                <div class="col-lg-12">
                                                   <!-- Icons -->
                                                        <ul class="list-group list-group-icons-meta">
                                                            <li class="list-group-item ">
                                                                    <a href="javascript:void(0);" data-toggle="modal" data-target=".create-coupen">
                                                                        <div class="media">
                                                                            <div class="d-flex mr-3">
                                                                                <i class="fa fa-tags"></i>
                                                                            </div>
                                                                            <div class="media-body">
                                                                                <h6 class="tx-inverse">Create Coupen</h6>
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                </li>
                                                            <li class="list-group-item  ">
                                                                <div class="media">
                                                                    <div class="d-flex mr-3">
                                                                        <i class="fa fa-video"></i>
                                                                    </div>
                                                                    <div class="media-body">
                                                                        <h6 class="tx-inverse">Create promo Video</h6>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li class="list-group-item ">
                                                                <div class="media">
                                                                    <div class="d-flex mr-3">
                                                                        <i class="fa fa-envelope-open"></i>
                                                                    </div>
                                                                    <div class="media-body">
                                                                        <h6 class="tx-inverse">Send email compaign</h6>
                                                                    </div>
                                                                </div>
                                                            </li>

                                                                  <li class="list-group-item ">
                                                                <div class="media">
                                                                    <div class="d-flex mr-3">
                                                                       <i class="fa fa-share-square"></i>
                                                                    </div>
                                                                    <div class="media-body">
                                                                        <h6 class="tx-inverse">Share Product</h6>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                        </ul>
                                               
                                                </div>

                                          
                                        </div>
                                       

                                </div>
                            </div>
                        </div>
                    </div>


                      <div class="row">
                        <div id="flFormsGrid" class="col-lg-12 layout-spacing">
                            <div class="statbox widget box box-shadow">
                                <div class="widget-header border-bottom">
                                    <div class="row">
                                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                            <h4>Advanced</h4>
                                        </div>                                                                        
                                    </div>
                                </div>
                                <div class="widget-content widget-content-area">
                                   
                                       
                                                   <div class="form-row mb-4">
                                            <div class="form-group col-md-12">
                                                <label for="">Fulfilled by</label>
                                                <input type="text" class="form-control" id="" placeholder="">
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label for="inputPassword4">Brands</label>
                                                <input type="text" class="form-control" id="" placeholder="">
                                            </div>
                                        </div>

                                          
                                       
                                       

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end right hand side -->

                        </div>
                    </div>
                    <!---->
                     <div class="row">
                        <div id="flFormsGrid" class="col-lg-8 layout-spacing">
                            <div class="statbox widget box box-shadow">
                                <div class="widget-header">
                                    <div class="row">
                                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                        <button class="btn btn-primary mb-4 mr-2 btn-lg" id="product_form_btn" type="submit">Save</button>
                                        </form>
                                        </div>                                                                        
                                    </div>
                                </div>
                              
                            </div>
                        </div>
                    </div>
                    <!---->
                    </div>
                </div>
            </div>
      </div>
   
   
         

         
    <!--  END CONTENT AREA  -->
    
    <!--additional_info Modal -->
<div class="modal fade show" id="additional_info" tabindex="-1" aria-labelledby="exampleModalCenterTitle" style="display: none; padding-right: 17px;" aria-modal="true" role="dialog">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalCenterTitle">Add an info section</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                      <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                 
                                                   <div class="form-row mb-4">
                                            <div class="form-group col-md-12">
                                                <label for="">Info section title</label>
                                                <input type="text" class="form-control" id="desTitle" placeholder="">
                                            </div>
                                            </div>
                                                    
                                                <label for="">Description</label>
                                                 <div id="des">
                                                     </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button class="btn" id="close" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Discard</button>
                                                    <button type="button" id="saveAdditionalInfo" class="btn btn-primary" >Save</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
    <!-- end -->
    <!--   add varient Modal    -->
    <div class="modal fade addVarientModal show" tabindex="-1" aria-labelledby="myLargeModalLabel" style="display: none; padding-right: 17px;" aria-modal="true" role="dialog">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="myLargeModalLabel">Add product option</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                      <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="form-row mb-4">
                                            <div class="form-group col-md-8">
                                                <label for="">Option name</label>
                                                <input type="text" class="form-control" id="optionName" placeholder="">
                                            </div>
                                            <div class="form-group col-md-4">
                                              <label for="">Show in product page as:</label>
                                               <div class="btn-group" role="group" aria-label="Basic example">
                                                   <!--  value 1 for list and value 0 for color -->
                                                   <input type="checkbox" value="1" id="variantType" onclick="showTypeField()" class="toggle form-control">
                                                </div>
                                            </div>
                                        </div>
                                         <div class="form-group mb-4" id="forTypeListDiv">
                                        <label class="control-label">Choices for this option:</label>
                                        <select name="status" id="forTypeList" class="form-control" multiple="multiple">
                                        </select>
                                        </div>
                                        <div class="form-group mb-4" id="forTypeColourDiv"  style="display:none;">
                                        <label class="control-label">Choices Colour option:</label>
                                         <select name="status" id="forTypeColour" class="form-control" multiple="multiple">
                                          <option value="#0048BA">Absolute Zero</option>
                                            <option value="#B0BF1A">Acid green</option>
                                            <option value="#7CB9E8">Aero</option>
                                            <option value="#C0E8D5">Aero blue</option>
                                            <option value="#B284BE">African violet</option>
                                            <option value="#72A0C1">Air superiority blue</option>
                                            <option value="#EDEAE0">Alabaster</option>
                                            <option value="#F0F8FF">Alice blue</option>
                                            <option value="#C46210">Alloy orange</option>
                                            <option value="#EFDECD">Almond</option>
                                            <option value="#E52B50">Amaranth</option>
                                            <option value="#9F2B68">Amaranth </option>
                                            <option value="#F19CBB">Amaranth pink</option>
                                            <option value="#AB274F">Amaranth purple</option>
                                            <option value="#D3212D">Amaranth red</option>
                                            <option value="#3B7A57">Amazon</option>
                                            <option value="#FFBF00">Amber</option>
                                            <option value="#FF7E00">Amber (SAE/ECE)</option>
                                            <option value="#9966CC">Amethyst</option>
                                            <option value="#3DDC84">Android green</option>
                                            <option value="#CD9575">Antique brass</option>
                                            <option value="#665D1E">Antique bronze</option>
                                            <option value="#915C83">Antique fuchsia</option>
                                            <option value="#841B2D">Antique ruby</option>
                                            <option value="#FAEBD7">Antique white</option>
                                            <option value="#008000">Ao (English)</option>
                                            <option value="#8DB600">Apple green</option>
                                            <option value="#FBCEB1">Apricot</option>
                                            <option value="#00FFFF">Aqua</option>
                                            <option value="#7FFFD4">Aquamarine</option>
                                            <option value="#D0FF14">Arctic lime</option>
                                            <option value="#4B5320">Army green</option>
                                            <option value="#8F9779">Artichoke</option>
                                            <option value="#E9D66B">Arylide yellow</option>
                                            <option value="#B2BEB5">Ash gray</option>
                                            <option value="#87A96B">Asparagus</option>
                                            <option value="#FF9966">Atomic tangerine</option>
                                            <option value="#A52A2A">Auburn</option>
                                            <option value="#FDEE00">Aureolin</option>
                                            <option value="#568203">Avocado</option>
                                            <option value="#007FFF">Azure</option>
                                            <option value="#F0FFFF">Azure (X11/web color)</option>
                                            <option value="#89CFF0">Baby blue</option>
                                            <option value="#A1CAF1">Baby blue eyes</option>
                                            <option value="#F4C2C2">Baby pink</option>
                                            <option value="#FEFEFA">Baby powder</option>
                                            <option value="#FF91AF">Baker-Miller pink</option>
                                            <option value="#FAE7B5">Banana Mania</option>
                                            <option value="#DA1884">Barbie Pink</option>
                                            <option value="#7C0A02">Barn red</option>
                                            <option value="#848482">Battleship grey</option>
                                            <option value="#BCD4E6">Beau blue</option>
                                            <option value="#9F8170">Beaver</option>
                                            <option value="#F5F5DC">Beige</option>
                                            <option value="#2E5894">B dazzled blue</option>
                                            <option value="#9C2542">Big dip o’ruby</option>
                                            <option value="#FFE4C4">Bisque</option>
                                            <option value="#3D2B1F">Bistre</option>
                                            <option value="#967117">Bistre brown</option>
                                            <option value="#CAE00D">Bitter lemon</option>
                                            <option value="#BFFF00">Bitter lime</option>
                                            <option value="#FE6F5E">Bittersweet</option>
                                            <option value="#BF4F51">Bittersweet shimmer</option>
                                            <option value="#000000">Black</option>
                                            <option value="#3D0C02">Black bean</option>
                                            <option value="#1B1811">Black chocolate</option>
                                            <option value="#3B2F2F">Black coffee</option>
                                            <option value="#54626F">Black coral</option>
                                            <option value="#3B3C36">Black olive</option>
                                            <option value="#BFAFB2">Black Shadows</option>
                                            <option value="#FFEBCD">Blanched almond</option>
                                            <option value="#A57164">Blast-off bronze</option>
                                            <option value="#318CE7">Bleu de France</option>
                                            <option value="#ACE5EE">Blizzard blue</option>
                                            <option value="#FAF0BE">Blond</option>
                                            <option value="#660000">Blood red</option>
                                            <option value="#0000FF">Blue</option>
                                            <option value="#1F75FE">Blue (Crayola)</option>
                                            <option value="#0093AF">Blue (Munsell)</option>
                                            <option value="#0087BD">Blue (NCS)</option>
                                            <option value="#0018A8">Blue (Pantone)</option>
                                            <option value="#333399">Blue (pigment)</option>
                                            <option value="#0247FE">Blue (RYB)</option>
                                            <option value="#A2A2D0">Blue bell</option>
                                            <option value="#6699CC">Blue-gray</option>
                                            <option value="#0D98BA">Blue-green</option>
                                            <option value="#064E40">Blue-green (color wheel)</option>
                                            <option value="#5DADEC">Blue jeans</option>
                                            <option value="#126180">Blue sapphire</option>
                                            <option value="#8A2BE2">Blue-violet</option>
                                            <option value="#7366BD">Blue-violet (Crayola)</option>
                                            <option value="#4D1A7F">Blue-violet (color wheel)</option>
                                            <option value="#5072A7">Blue yonder</option>
                                            <option value="#3C69E7">Bluetiful</option>
                                            <option value="#DE5D83">Blush</option>
                                            <option value="#79443B">Bole</option>
                                            <option value="#E3DAC9">Bone</option>
                                            <option value="#006A4E">Bottle green</option>
                                            <option value="#87413F">Brandy</option>
                                            <option value="#CB4154">Brick red</option>
                                            <option value="#66FF00">Bright green</option>
                                            <option value="#D891EF">Bright lilac</option>
                                            <option value="#C32148">Bright maroon</option>
                                            <option value="#1974D2">Bright navy blue</option>
                                            <option value="#FFAA1D">Bright yellow (Crayola)</option>
                                            <option value="#FF55A3">Brilliant rose</option>
                                            <option value="#FB607F">Brink pink</option>
                                            <option value="#004225">British racing green</option>
                                            <option value="#CD7F32">Bronze</option>
                                            <option value="#88540B">Brown</option>
                                            <option value="#AF6E4D">Brown sugar</option>
                                            <option value="#1B4D3E">Brunswick green</option>
                                            <option value="#7BB661">Bud green</option>
                                            <option value="#FFC680">Buff</option>
                                            <option value="#800020">Burgundy</option>
                                            <option value="#DEB887">Burlywood</option>
                                            <option value="#A17A74">Burnished brown</option>
                                            <option value="#CC5500">Burnt orange</option>
                                            <option value="#E97451">Burnt sienna</option>
                                            <option value="#8A3324">Burnt umber</option>
                                            <option value="#BD33A4">Byzantine</option>
                                            <option value="#702963">Byzantium</option>
                                            <option value="#536872">Cadet</option>
                                            <option value="#5F9EA0">Cadet blue</option>
                                            <option value="#A9B2C3">Cadet blue (Crayola)</option>
                                            <option value="#91A3B0">Cadet grey</option>
                                            <option value="#006B3C">Cadmium green</option>
                                            <option value="#ED872D">Cadmium orange</option>
                                            <option value="#E30022">Cadmium red</option>
                                            <option value="#FFF600">Cadmium yellow</option>
                                            <option value="#A67B5B">Café au lait</option>
                                            <option value="#4B3621">Café noir</option>
                                            <option value="#A3C1AD">Cambridge blue</option>
                                            <option value="#C19A6B">Camel</option>
                                            <option value="#EFBBCC">Cameo pink</option>
                                            <option value="#FFFF99">Canary</option>
                                            <option value="#FFEF00">Canary yellow</option>
                                            <option value="#FF0800">Candy apple red</option>
                                            <option value="#E4717A">Candy pink</option>
                                            <option value="#00BFFF">Capri</option>
                                            <option value="#592720">Caput mortuum</option>
                                            <option value="#C41E3A">Cardinal</option>
                                            <option value="#00CC99">Caribbean green</option>
                                            <option value="#960018">Carmine</option>
                                            <option value="#D70040">Carmine (M&amp;P)</option>
                                            <option value="#FFA6C9">Carnation pink</option>
                                            <option value="#B31B1B">Carnelian</option>
                                            <option value="#56A0D3">Carolina blue</option>
                                            <option value="#ED9121">Carrot orange</option>
                                            <option value="#00563F">Castleton green</option>
                                            <option value="#703642">Catawba</option>
                                            <option value="#C95A49">Cedar Chest</option>
                                            <option value="#ACE1AF">Celadon</option>
                                            <option value="#007BA7">Celadon blue</option>
                                            <option value="#2F847C">Celadon green</option>
                                            <option value="#B2FFFF">Celeste</option>
                                            <option value="#246BCE">Celtic blue</option>
                                            <option value="#DE3163">Cerise</option>
                                            <option value="#007BA7">Cerulean</option>
                                            <option value="#2A52BE">Cerulean blue</option>
                                            <option value="#6D9BC3">Cerulean frost</option>
                                            <option value="#1DACD6">Cerulean (Crayola)</option>
                                            <option value="#007AA5">CG blue</option>
                                            <option value="#E03C31">CG red</option>
                                            <option value="#F7E7CE">Champagne</option>
                                            <option value="#F1DDCF">Champagne pink</option>
                                            <option value="#36454F">Charcoal</option>
                                            <option value="#232B2B">Charleston green</option>
                                            <option value="#E68FAC">Charm pink</option>
                                            <option value="#DFFF00">Chartreuse (traditional)</option>
                                            <option value="#7FFF00">Chartreuse (web)</option>
                                            <option value="#FFB7C5">Cherry blossom pink</option>
                                            <option value="#954535">Chestnut</option>
                                            <option value="#E23D28">Chili red</option>
                                            <option value="#DE6FA1">China pink</option>
                                            <option value="#A8516E">China rose</option>
                                            <option value="#AA381E">Chinese red</option>
                                            <option value="#856088">Chinese violet</option>
                                            <option value="#FFB200">Chinese yellow</option>
                                            <option value="#7B3F00">Chocolate (traditional)</option>
                                            <option value="#D2691E">Chocolate (web)</option>
                                            <option value="#58111A">Chocolate Cosmos</option>
                                            <option value="#FFA700">Chrome yellow</option>
                                            <option value="#98817B">Cinereous</option>
                                            <option value="#E34234">Cinnabar</option>
                                            <option value="#CD607E">Cinnamon Satin</option>
                                            <option value="#E4D00A">Citrine</option>
                                            <option value="#9FA91F">Citron</option>
                                            <option value="#7F1734">Claret</option>
                                            <option value="#0047AB">Cobalt blue</option>
                                            <option value="#D2691E">Cocoa brown</option>
                                            <option value="#6F4E37">Coffee</option>
                                            <option value="#B9D9EB">Columbia Blue</option>
                                            <option value="#F88379">Congo pink</option>
                                            <option value="#8C92AC">Cool grey</option>
                                            <option value="#B87333">Copper</option>
                                            <option value="#DA8A67">Copper (Crayola)</option>
                                            <option value="#AD6F69">Copper penny</option>
                                            <option value="#CB6D51">Copper red</option>
                                            <option value="#996666">Copper rose</option>
                                            <option value="#FF3800">Coquelicot</option>
                                            <option value="#FF7F50">Coral</option>
                                            <option value="#F88379">Coral pink</option>
                                            <option value="#893F45">Cordovan</option>
                                            <option value="#FBEC5D">Corn</option>
                                            <option value="#B31B1B">Cornell red</option>
                                            <option value="#6495ED">Cornflower blue</option>
                                            <option value="#FFF8DC">Cornsilk</option>
                                            <option value="#2E2D88">Cosmic cobalt</option>
                                            <option value="#FFF8E7">Cosmic latte</option>
                                            <option value="#81613C">Coyote brown</option>
                                            <option value="#FFBCD9">Cotton candy</option>
                                            <option value="#FFFDD0">Cream</option>
                                            <option value="#DC143C">Crimson</option>
                                            <option value="#9E1B32">Crimson (UA)</option>
                                            <option value="#A7D8DE">Crystal</option>
                                            <option value="#F5F5F5">Cultured</option>
                                            <option value="#00FFFF">Cyan</option>
                                            <option value="#00B7EB">Cyan (process)</option>
                                            <option value="#58427C">Cyber grape</option>
                                            <option value="#FFD300">Cyber yellow</option>
                                            <option value="#F56FA1">Cyclamen</option>
                                            <option value="#666699">Dark blue-gray</option>
                                            <option value="#654321">Dark brown</option>
                                            <option value="#5D3954">Dark byzantium</option>
                                            <option value="#26428B">Dark cornflower blue</option>
                                            <option value="#008B8B">Dark cyan</option>
                                            <option value="#536878">Dark electric blue</option>
                                            <option value="#B8860B">Dark goldenrod</option>
                                            <option value="#013220">Dark green</option>
                                            <option value="#006400">Dark green (X11)</option>
                                            <option value="#1A2421">Dark jungle green</option>
                                            <option value="#BDB76B">Dark khaki</option>
                                            <option value="#483C32">Dark lava</option>
                                            <option value="#534B4F">Dark liver</option>
                                            <option value="#543D37">Dark liver (horses)</option>
                                            <option value="#8B008B">Dark magenta</option>
                                            <option value="#4A5D23">Dark moss green</option>
                                            <option value="#556B2F">Dark olive green</option>
                                            <option value="#FF8C00">Dark orange</option>
                                            <option value="#9932CC">Dark orchid</option>
                                            <option value="#03C03C">Dark pastel green</option>
                                            <option value="#301934">Dark purple</option>
                                            <option value="#8B0000">Dark red</option>
                                            <option value="#E9967A">Dark salmon</option>
                                            <option value="#8FBC8F">Dark sea green</option>
                                            <option value="#3C1414">Dark sienna</option>
                                            <option value="#8CBED6">Dark sky blue</option>
                                            <option value="#483D8B">Dark slate blue</option>
                                            <option value="#2F4F4F">Dark slate gray</option>
                                            <option value="#177245">Dark spring green</option>
                                            <option value="#00CED1">Dark turquoise</option>
                                            <option value="#9400D3">Dark violet</option>
                                            <option value="#00703C">Dartmouth green</option>
                                            <option value="#555555">Davys grey</option>
                                            <option value="#DA3287">Deep cerise</option>
                                            <option value="#FAD6A5">Deep champagne</option>
                                            <option value="#B94E48">Deep chestnut</option>
                                            <option value="#004B49">Deep jungle green</option>
                                            <option value="#FF1493">Deep pink</option>
                                            <option value="#FF9933">Deep saffron</option>
                                            <option value="#00BFFF">Deep sky blue</option>
                                            <option value="#4A646C">Deep Space Sparkle</option>
                                            <option value="#7E5E60">Deep taupe</option>
                                            <option value="#1560BD">Denim</option>
                                            <option value="#2243B6">Denim blue</option>
                                            <option value="#C19A6B">Desert</option>
                                            <option value="#EDC9AF">Desert sand</option>
                                            <option value="#696969">Dim gray</option>
                                            <option value="#1E90FF">Dodger blue</option>
                                            <option value="#D71868">Dogwood rose</option>
                                            <option value="#967117">Drab</option>
                                            <option value="#00009C">Duke blue</option>
                                            <option value="#EFDFBB">Dutch white</option>
                                            <option value="#E1A95F">Earth yellow</option>
                                            <option value="#555D50">Ebony</option>
                                            <option value="#C2B280">Ecru</option>
                                            <option value="#1B1B1B">Eerie black</option>
                                            <option value="#614051">Eggplant</option>
                                            <option value="#F0EAD6">Eggshell</option>
                                            <option value="#1034A6">Egyptian blue</option>
                                            <option value="#16161D">Eigengrau</option>
                                            <option value="#7DF9FF">Electric blue</option>
                                            <option value="#00FF00">Electric green</option>
                                            <option value="#6F00FF">Electric indigo</option>
                                            <option value="#CCFF00">Electric lime</option>
                                            <option value="#BF00FF">Electric purple</option>
                                            <option value="#8F00FF">Electric violet</option>
                                            <option value="#50C878">Emerald</option>
                                            <option value="#6C3082">Eminence</option>
                                            <option value="#1B4D3E">English green</option>
                                            <option value="#B48395">English lavender</option>
                                            <option value="#AB4B52">English red</option>
                                            <option value="#CC474B">English vermillion</option>
                                            <option value="#563C5C">English violet</option>
                                            <option value="#00FF40">Erin</option>
                                            <option value="#96C8A2">Eton blue</option>
                                            <option value="#C19A6B">Fallow</option>
                                            <option value="#801818">Falu red</option>
                                            <option value="#B53389">Fandango</option>
                                            <option value="#DE5285">Fandango pink</option>
                                            <option value="#F400A1">Fashion fuchsia</option>
                                            <option value="#E5AA70">Fawn</option>
                                            <option value="#4D5D53">Feldgrau</option>
                                            <option value="#4F7942">Fern green</option>
                                            <option value="#6C541E">Field drab</option>
                                            <option value="#FF5470">Fiery rose</option>
                                            <option value="#B22222">Firebrick</option>
                                            <option value="#CE2029">Fire engine red</option>
                                            <option value="#E95C4B">Fire opal</option>
                                            <option value="#E25822">Flame</option>
                                            <option value="#EEDC82">Flax</option>
                                            <option value="#A2006D">Flirt</option>
                                            <option value="#FFFAF0">Floral white</option>
                                            <option value="#15F4EE">Fluorescent blue</option>
                                            <option value="#5FA777">Forest green (Crayola)</option>
                                            <option value="#014421">Forest green (traditional)</option>
                                            <option value="#228B22">Forest green (web)</option>
                                            <option value="#A67B5B">French beige</option>
                                            <option value="#856D4D">French bistre</option>
                                            <option value="#0072BB">French blue</option>
                                            <option value="#FD3F92">French fuchsia</option>
                                            <option value="#86608E">French lilac</option>
                                            <option value="#9EFD38">French lime</option>
                                            <option value="#D473D4">French mauve</option>
                                            <option value="#FD6C9E">French pink</option>
                                            <option value="#C72C48">French raspberry</option>
                                            <option value="#F64A8A">French rose</option>
                                            <option value="#77B5FE">French sky blue</option>
                                            <option value="#8806CE">French violet</option>
                                            <option value="#E936A7">Frostbite</option>
                                            <option value="#FF00FF">Fuchsia</option>
                                            <option value="#C154C1">Fuchsia (Crayola)</option>
                                            <option value="#CC397B">Fuchsia purple</option>
                                            <option value="#C74375">Fuchsia rose</option>
                                            <option value="#E48400">Fulvous</option>
                                            <option value="#87421">Fuzzy Wuzzy</option>
                                        </select>
                                    </div>
                                                        </div>
                                                <div class="modal-footer">
                                                    <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Discard</button>
                                                    <button type="button" id="saveVariantBtn" class="btn btn-primary">Save</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
    <!--   end    -->
    
    <!-- add variant Pricing options Modal    -->
    
    <div class="modal fade manageVarientPricing show" tabindex="-1" aria-labelledby="myExtraLargeModalLabel" style="display: none; padding-right: 17px;" aria-modal="true" role="dialog">
                                      <div class="modal-dialog modal-xl" role="document">
                                        <div class="modal-content variantModalBody">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="myExtraLargeModalLabel">Manage Variants</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                  <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <!--<div class="widget-content widget-content-area">-->
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover table-striped table-checkable table-highlight-head mb-4">
                                            <thead>
                                                <tr>
                                                    <th class="checkbox-column">
                                                        <label class="new-control new-checkbox checkbox-primary" style="height: 18px; margin: 0 auto;">
                                                            <input type="checkbox" class="new-control-input todochkbox" id="todoAll">
                                                            <span class="new-control-indicator"></span>
                                                        </label>
                                                    </th>
                                                    <th class="">Varient</th>
                                                    <th class="text-center">Charge(+/-)</th>
                                                    <th class="text-center">Price</th>
                                                    <th class="text-center">Sku</th>
                                                    <th class="text-center">Inventry</th>
                                                    <th class="text-center">Shipping Weight</th>
                                                    <th class="text-center">Visibility</th>
                                                </tr>
                                            </thead>
                                            <tbody id="variantPricingOption">
                                                
                                            </tbody>
                                        </table>
                                    </div>

                                   
                                <!--</div>-->
                                            </div>
                                            <div class="modal-footer">
                                                <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Discard</button>
                                                <button type="button" class="btn btn-primary">Save</button>
                                            </div>
                                        </div>
                                      </div>
                                    </div>
    
    <!-- end -->
       <!-- subscription Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add a subscription</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               
                </button>
            </div>
            <div class="modal-body">
         
               
                                            <div class="form-row mb-4">
                                            <div class="form-group col-md-6">
                                                <label for="">Name</label>
                                                <input type="text" class="form-control" id="subName" placeholder="eg. Coffee of the Month">
                                            </div>
                                                 <div class="form-group col-md-6">
                                                <label for="">Tagline(optional)</label>
                                                <input type="text" class="form-control" id="tagLine" placeholder="eg. Subscribe & save 15%">
                                            </div>
                                            </div>


                                            Subscription details
                                            
                                            <div class="form-row mb-4">
                                            <div class="form-group col-md-6">
                                                <label for="">Frequency</label>
                                                <select class="form-control">
                                                <option>select</option>
                                                 <option value="#0048BA">Absolute Zero</option>
                                                </select>     
                                            </div>
                                                 <div class="form-group col-md-6">
                                                <label for="">Duration</label>
                                                <select class="form-control"> 
                                                <option>select</option>
                                                 <option value="#0048BA">Absolute Zero</option>
                                                </select>   
                                            </div>
                                            </div>
                                            
                                                   <div class="form-row mb-4">
                                            <div class="form-group col-md-6">
                                                <label for="">Discount</label>
                                                <input type="text" class="form-control" id="subDiscount" placeholder="0%">
                                            </div>
                                                 <div class="form-group col-md-6">
                                                <label for="">Price</label>
                                                <input type="text" class="form-control" id="subPrice" placeholder="$ 32.35">
                                            </div>
                                            </div>
          </div>
            <div class="modal-footer">
                <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Discard</button>
                <button type="button" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>
<!--end-->
    <!-- coupen modals start -->
    <div class="modal fade create-coupen" tabindex="-1" role="dialog" aria-labelledby="create-coupenLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-white" id="create-coupenLabel">Create Coupen Form</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="opacity: 1;">
                        <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x">
                            <line x1="18" y1="6" x2="6" y2="18"></line>
                            <line x1="6" y1="6" x2="18" y2="18"></line>
                        </svg>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div id="tabsWithIcons" class="col-lg-12 col-12">
                            <ul class="nav nav-pills mb-4 mt-3 " id="rounded-pills-icon-tab" role="tablist">
                                <!-- 1 -->
                                <li class="nav-item ml-2 mr-2">
                                    <a class="nav-link mb-2 active text-center bg-primary" id="discount-tab-menu" data-toggle="pill" href="#discount-tab" role="tab" aria-controls="discount-tab" aria-selected="true">
                                        <h5><i class="fa fa-percent" style="font-size:24px;"></i></h5>
                                        Discount
                                    </a>
                                </li>
                                <!-- 2 -->
                                <li class="nav-item ml-2 mr-2">
                                    <a class="nav-link mb-2 text-center bg-warning" id="dollar-tab-menu" data-toggle="pill" href="#dollar-tab" role="tab" aria-controls="dollar-tab" aria-selected="false">
                                        <h5> <i class="fa fa-dollar-sign text-white" style="font-size: 24px;"></i></h5>
                                        Discount2
                                    </a>
                                </li>
                                <!-- 3 -->
                                <li class="nav-item ml-2 mr-2">
                                    <a class="nav-link mb-2 text-center bg-dark" id="shipping-tab-menu" data-toggle="pill" href="#shipping-tab" role="tab" aria-controls="shipping tab" aria-selected="false">
                                        <h5> <i class="fa fa-truck" style="font-size: 24px;"></i></h5>
                                        Free shipping
                                    </a>
                                </li>
                                <!-- 4 -->
                                <li class="nav-item ml-2 mr-2">
                                    <a class="nav-link mb-2 text-center bg-success" id="sale-tab-menu" data-toggle="pill" href="#sale-tab" role="tab" aria-controls="sale-tab" aria-selected="false">
                                        <h5> <i class="fa fa-tag" style="font-size: 24px;"></i></h5> Sale Price
                                    </a>
                                </li>
                                <!-- 5 -->
                                <li class="nav-item ml-2 mr-2">
                                    <a class="nav-link mb-2 text-center bg-danger" id="buy-tab-menu" data-toggle="pill" href="#buy-tab" role="tab" aria-controls="buy-tab" aria-selected="false">
                                        <h5> <i class="fa fa-tags" style="font-size: 24px;"></i></h5> Buy X get Y free
                                    </a>
                                </li>
                            </ul>
                            <div class="tab-content" id="rounded-pills-icon-tabContent">
                                <!-- 1 -->
                                <div class="tab-pane fade show active" id="discount-tab" role="tabpanel" aria-labelledby="discount-tab-menu">
                                    <div class="form-row mb-4">
                                        <div class="form-group col-md-6">
                                            <label for=""> Coupen code </label>
                                            <input type="text" class="form-control" id="" placeholder="">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="">Coupen Name</label>
                                            <input type="text" class="form-control" id="" placeholder="">
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label for=""> Discount in (%) </label>
                                            <div class="input-group mb-4">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon5">%</span>
                                                </div>
                                                <input type="text" class="form-control" placeholder="Username" aria-label="Username">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="">Apply To</label>
                                            <select class="selectpicker w-100">
                                                <option selected="" disabled="">Choose One</option>
                                                <option>All Product</option>
                                                <option>Specfic Product </option>
                                                <option>Specfic Collection </option>
                                                <option value="">Minimum order subtotal</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="">Product</label>
                                            <input type="text" class="form-control" id="" placeholder="">
                                        </div>
                                        <div class="form-group col-md-12">
                                            <div class="n-chk">
                                                <label class="new-control new-checkbox checkbox-success">
                                                    <input type="checkbox" class="new-control-input">
                                                    <span class="new-control-indicator"></span>Apply Only to the low price items
                                                </label>
                                            </div>
                                            <div class="n-chk">
                                                <label class="new-control new-checkbox checkbox-success">
                                                    <input type="checkbox" class="new-control-input" checked>
                                                    <span class="new-control-indicator"></span>Apply to only every relevant items in an order
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- 2 -->
                                <div class="tab-pane fade" id="dollar-tab" role="tabpanel" aria-labelledby="dollar-tab-menu">
                                    <div class="form-row mb-4">
                                        <div class="form-group col-md-6">
                                            <label for=""> Coupen code </label>
                                            <input type="text" class="form-control" id="" placeholder="">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="">Coupen Name</label>
                                            <input type="text" class="form-control" id="" placeholder="">
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label for=""> Discount in ($) </label>
                                            <div class="input-group mb-4">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon5">$</span>
                                                </div>
                                                <input type="text" class="form-control" placeholder="" aria-label="">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="">Apply To</label>
                                            <select class="selectpicker w-100">
                                                <option selected="" disabled="">Choose One</option>
                                                <option>All Product</option>
                                                <option>Specfic Product </option>
                                                <option>Specfic Collection </option>
                                                <option value="">Minimum order subtotal</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="">Product</label>
                                            <input type="text" class="form-control" id="" placeholder="">
                                        </div>
                                        <div class="form-group col-md-12">
                                            <div class="n-chk">
                                                <label class="new-control new-checkbox checkbox-success">
                                                    <input type="checkbox" class="new-control-input">
                                                    <span class="new-control-indicator"></span>Apply Only to the low price items
                                                </label>
                                            </div>
                                            <div class="n-chk">
                                                <label class="new-control new-checkbox checkbox-success">
                                                    <input type="checkbox" class="new-control-input" checked>
                                                    <span class="new-control-indicator"></span>Apply to only every relevant items in an order
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- 3 -->
                                <div class="tab-pane fade" id="shipping-tab" role="tabpanel" aria-labelledby="shipping-tab-menu">
                                    <div class="form-row mb-4">
                                        <div class="form-group col-md-6">
                                            <label for=""> Coupen code </label>
                                            <input type="text" class="form-control" id="" placeholder="">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="">Coupen Name</label>
                                            <input type="text" class="form-control" id="" placeholder="">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="">Apply To</label>
                                            <select class="selectpicker w-100">
                                                <option selected="" disabled="">Choose One</option>
                                                <option>All Product</option>
                                                <option>Specfic Product </option>
                                                <option>Specfic Collection </option>
                                                <option value="">Minimum order subtotal</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <!-- 4 -->
                                <div class="tab-pane fade" id="sale-tab" role="tabpanel" aria-labelledby="sale-tab-menu">
                                    <div class="form-row mb-4">
                                        <div class="form-group col-md-6">
                                            <label for=""> Coupen code </label>
                                            <input type="text" class="form-control" id="" placeholder="">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="">Coupen Name</label>
                                            <input type="text" class="form-control" id="" placeholder="">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="">Now Only</label>
                                            <div class="input-group mb-4">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon5">$</span>
                                                </div>
                                                <input type="text" class="form-control" placeholder="" aria-label="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- 5 -->
                                <div class="tab-pane fade" id="buy-tab" role="tabpanel" aria-labelledby="buy-tab-menu">
                                    <div class="form-row mb-4">
                                        <div class="form-group col-md-6">
                                            <label for=""> Coupen code </label>
                                            <input type="text" class="form-control" id="" placeholder="">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="">Coupen Name</label>
                                            <input type="text" class="form-control" id="" placeholder="">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="">Buy</label>
                                            <input type="text" class="form-control" id="" placeholder="2">
                                            <br>
                                            <span><b>Eg., </b>Buy 2 apple and get 1 apple free</span>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="">Get</label>
                                            <input type="text" class="form-control" id="" placeholder="1">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="">Apply To</label>
                                            <input type="text" class="form-control" id="" placeholder="">
                                        </div>
                                        <div class="form-group col-md-12">
                                            <div class="n-chk">
                                                <label class="new-control new-checkbox checkbox-success">
                                                    <input type="checkbox" class="new-control-input">
                                                    <span class="new-control-indicator"></span>Apply Only to the low price items
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="coupen_input">
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <hr>
                                    <div class="n-chk">
                                        <label class="new-control new-checkbox checkbox-success">
                                            <input type="checkbox" class="new-control-input">
                                            <span class="new-control-indicator"></span> Include Subscription
                                        </label>
                                    </div>
                                    <p style="margin-top: 15px;"> Customer will use coupen for first time purchase and for every recurring purchase. </p>
                                    <hr>
                                </div>


                                <div class="form-group col-md-4">
                                    <label for="">Start of Valid </label>
                                     <input id="startbasicFlatpickr" value="2020-09-04" class="form-control flatpickr flatpickr-input active" type="text" placeholder="Select Date..">
                                </div>
                                  <div class="form-group col-md-4">
                                    <label for="">End of valid</label>
                                     <input id="endbasicFlatpickr" value="2020-09-04" class="form-control flatpickr flatpickr-input active" type="text" placeholder="Select Date..">
                                </div>

                                     <div class="form-group col-md-12">
                                        <h5>Limit Uses</h5>
                                          <div class="n-chk">
                                                <label class="new-control new-checkbox checkbox-success">
                                                    <input type="checkbox" class="new-control-input">
                                                    <span class="new-control-indicator"></span>Limit the total no of uses for this coupen


                                                </label>
                                            </div>
                                            <br>

                                              <input id=""  class="form-control " type="text" placeholder="">
                                                   <br>

                                                 <div class="n-chk">
                                                <label class="new-control new-checkbox checkbox-success">
                                                    <input type="checkbox" class="new-control-input">
                                                    <span class="new-control-indicator"></span>Limit to one per use customer


                                                </label>
                                            </div>
                                   
                                </div>



                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Discard</button>
                    <button type="button" class="btn btn-primary">Create Coupen</button>
                </div>
            </div>
        </div>
    </div>
    <!-- coupen modals end -->
    
    
 <!--  Connect Image Moadal -->
 
 <div class="modal fade connectImgModal show" tabindex="-1" aria-labelledby="myLargeModalLabel" style="display: none; padding-right: 17px;" aria-modal="true" role="dialog">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="myLargeModalLabel">Connect images to an option</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                      <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form id="connectImgForm" encrypt="multipart/form-data" >
                                                   <div>Select an option and connect images you want customers to see when they click on that option's choices.</div>
                                                   <div class="alert alert-info col-sm-11" role="alert">
                                                      Please note - you can only connect images to one option.
                                                    </div>
                                                   <div class="form-group col-sm-4">
                                                      <h6>Select an option</h6>
                                                        <select class="form-control" name="imgOption" id="imgOption" onchange="imgOptions($(this).val())" >
                                                           
                                                       </select>
                                                       
                                                   </div>
                                                  <div class="widget-content widget-content-area">
                                    <div class="table-responsive">
                                        <table class="table mb-4">
                                       
                                          <thead>
                                                <tr>
                                                  
                                                    <th>Choice</th>
                                                    <th>Product Images</th>
                                                    
                                                </tr>
                                            </thead>
                                            <tbody id="optionForImg">
                                
                                            </tbody>
                                        </table>
                                    </div>

                                    

                                </div>
                                                    </div>
                                                <div class="modal-footer">
                                                    <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Discard</button>
                                                    <button type="button" id="saveConnectImg" class="btn btn-primary">Save</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
    <!--   end    -->       
  
  <!-- end -->
    

    @endsection
    
    
    @section('page-js')
<!-- script -->

      <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
  <!--<script src="{{asset('project/public/admin/assets/js/libs/jquery-3.1.1.min.js')}}"></script>-->
  <!--  <script src="{{asset('project/public/admin/bootstrap/js/popper.min.js')}}"></script>-->
 
  <!--  <script src="{{asset('project/public/admin/plugins/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>-->
    <!--<script src="{{asset('project/public/admin/plugins/blockui/jquery.blockUI.min.js')}}"></script>-->
    <!--<script src="{{asset('project/public/admin/assets/js/app.js')}}"></script>-->
    
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
    <!--<script src="{{asset('project/public/admin/plugins/editors/quill/quill.js')}}"></script>-->
    <!--<script src="{{asset('project/public/admin/plugins/editors/quill/custom-quill.js')}}"></script>-->

    
    <script>
        $(document).ready(function() {
            App.init();
        });
    </script>
    <script src="{{asset('project/public/admin/plugins/highlight/highlight.pack.js')}}"></script>
    <script src="{{asset('project/public/admin/assets/js/custom.js')}}"></script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->
    
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <script src="{{asset('project/public/admin/assets/js/scrollspyNav.js')}}"></script>
    <script src="{{asset('project/public/admin/plugins/bootstrap-select/bootstrap-select.min.js')}}"></script>
    <script src="{{asset('project/public/admin/plugins/file-upload/file-upload-with-preview.min.js')}}"></script>
     <script src="{{asset('project/public/admin/plugins/editors/markdown/simplemde.min.js')}}"></script>
    <script src="{{asset('project/public/admin/plugins/editors/markdown/custom-markdown.js')}}"></script>
    <script src="{{asset('project/public/admin/plugins/select2/select2.min.js')}}"></script>
    <script>
      
        //Second upload
        var secondUpload = new FileUploadWithPreview('mySecondImage')
        
    </script>

    <script>
        new SimpleMDE({
        element: document.getElementById("description_text"),
        spellChecker: false,
        });
       $("#forTypeList").select2({
    tags: true
});
  $("#forTypeColour").select2({
    tags: true
});
    </script>
    <script>
   var quill = new Quill('#des', {
  modules: {
    toolbar: [
      [{ header: [1, 2, false] }],
      ['bold', 'italic', 'underline'],
      ['image', 'code-block']
    ]
  },
  placeholder: 'Compose an epic...',
  theme: 'snow'  // or 'bubble'
});

    </script>
    
    <script>
     $('document').ready(function(){
        $( "#unitCheck" ).on( "click", function() {
    // function unitCheck(){
            if($('#price').val()==""){
                toastr.info('Please Enter Price');
                return false;
            }
            if($(this).prop("checked") == true){
            $( this ).val('1') ;
            console.log( $( this ).val() );
            // return false;
            let unitPriceDiv = `<div  id="unitPriceDiv" >
    <div class="form-row mb-4">
              <div class="form-group col-md-8">
                                                <label for="">Select Unit Mesurement</label>
                                               <select class="form-control" id="unitMesurement" name="unitMesurement" onchange="calculateUnitPrice()" >
                                               <optgroup label="Weight"></optgroup>
                                                <option value="mg">mg</option>
                                                <option value="g">g</option>
                                                <option  value="kg">kg</option>
                                               <optgroup label="Volume"></optgroup>
                                                <option  value="ml">ml</option>
                                                <option  value="cl">cl</option>
                                                <option  value="l">l</option>
                                                <option  value="m3">m³ </option>
                                                <optgroup label="length"></optgroup>
                                                <option value="mm">mm</option> 
                                                <option value="cm">cm</option>
                                                <option value="m">m</option>
                                                 <optgroup label="Area"></optgroup>
                                                <option value="m2">m²</option> 
                                            </select>
                                            </div>
                                            <div class="form-group col-md-8">
                                                <label for="">Total product quantity in units (in <span class="unit"></span>)</label>
                                                <input type="text" class="form-control" onchange="calculateUnitPrice()" name="ptoductQuantity" id="totalProductQuantity"  placeholder="">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="inputPassword4">Base units (in <span class="unit"></span>)</label>
                                                <input type="text" class="form-control" onchange="calculateUnitPrice()" name="baseUnit" id="baseUnits" placeholder="">
                                            </div>
                                        </div>
                                     <div class="form-row mb-4"> 
                                     <div class="form-group col-md-6">
                                                <label for="">Base price per unit</label>
                                               <h6 style=" display: inline-flex; "><span class="dollor" >$</span><input id="baseUnitRes" class="form-control" name="basePrice"> <span class="unit"></span> </h6>
                                            </div>
                                     </div>
                                     </div>
                                        `; 
             $('#UnitPrice').append(unitPriceDiv);
             let unit = $('#unitMesurement').val();
           console.log('unit ='+unit);
           $('.unit').text(unit);
            }
             else if($(this).prop("checked") == false){
                   $( this ).val('0') 
                    console.log( $( this ).val() );
                    $('#unitPriceDiv').remove();
                // console.log("Checkbox is unchecked.");
            }
    // }
}); 
    });
    
    $('document').ready(function(){
        $( "#saleCheck" ).on( "click", function() {
            if($('#price').val()==""){
                toastr.info('Please Enter Price');
                return false;
            }
            if($(this).prop("checked") == true){
            $( this ).val('1') ;
            console.log( $( this ).val() );
            let salePriceDiv = `<div class="form-row mb-4" id="salePriceDiv" >
                                            <div class="form-group col-md-4">
                                                <label for="">Discount(in %)</label>
                                                <input type="text" class="form-control " id="discountPercentage" name="discountPerc" onchange="discountCalculate()" placeholder="">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="inputPassword4">Sale Price</label>
                                                <input type="text" class="form-control" id="salePrice" name="salePrice" placeholder="">
                                            </div>
                                        </div>`; 
             $('#onSale').append($(salePriceDiv));
            }
             else if($(this).prop("checked") == false){
                   $( this ).val('0') 
                    console.log( $( this ).val() );
                    $('#salePriceDiv').remove();
                // console.log("Checkbox is unchecked.");
            }
}); 
    });
    
    function discountCalculate(){
     let price = $('#price').val();
     let discountPercentage =document.getElementById("discountPercentage").value;
     let discountPrice = discountPercentage/100 * price ;
     let salePrice = price - discountPrice ;
     $('#salePrice').val(salePrice);

}
 
  $('document').ready(function(){
        $( "#saveAdditionalInfo" ).on( "click", function() {
      
        let title = $('#desTitle').val();
        // console.log(title);
        let des = unescape($('#des').children().html());
        // console.log(des);
        if(title === "" && des==='<p><br></p>' ||title === ""|| des==='<p><br></p>'){
            toastr.success('Fill all fields');
            return false;
        }
       
        let additionalInfo = ` <div class="row  py-3">
                                               <div class="col-lg-4 col-md-4 col-6">
                                             
                                                     <h6><input type="text" class="form-control" name="additonalTitle[]" value="${title}"></h6>
                                               </div>
                                               <div class="col-lg-8 col-md-8 col-6">
                                                  <h6><textarea class="form-control" name="additonalDes[]">${des}</textarea></h6>
                                               </div>
                                           </div>`; 
 $('#desTitle').val("");
 $('#des').children().html("");
 $('#add_other_des').append(additionalInfo);
 $('.close').click();
        });
  });

    // calculate  unit price 
    function calculateUnitPrice() {
           let unit = $('#unitMesurement').val(); 
           console.log(unit);
           $('.unit').text(unit);
           let price = $('#price').val();
           let baseUnit = $('#baseUnits').val();
           let totalProductQuantity =$('#totalProductQuantity').val();
           console.log(price);
           console.log(baseUnit);
          console.log(totalProductQuantity);
          if(price!='' && baseUnit!=''&& totalProductQuantity!="" ){
                   let baseUnitRes = price/totalProductQuantity * baseUnit;
                   console.log(baseUnitRes);
                   $('#baseUnitRes').val(baseUnitRes+"/"+baseUnit);
          }
        }
        
    </script>
    <script>
        $(document).ready(function(){

     
            $('#variantPrice').on('click',function(){
                // console.log($('#allVarients').html());
                    let price = document.getElementById('price').value;
         if(price==""){
             toastr.info('Enter Product Price');
             return false;
         }
            function isEmpty( el ){
      return !$.trim(el.html())
  }
  if (isEmpty($('#allVarients'))) {
                toastr.info('Please Add Varient');
                return false;
            }
            else
            if($(this).prop("checked") == true){
            $( this ).val('1') ;
            $('#manageVariantBtn').click();
            // console.log( $( this ).val() );
         let dataName = Array.from(document.querySelectorAll('.optionName'));
        //  let da = document.getElementsByName('optionName').value;
        let arrayDataName =[];
//      dataName.forEach(function( el => el.value) {
//          arrayDataName.push(el.value)
// });
        dataName.forEach((element) => {
             arrayDataName.push(element.value);
        });
        // console.log(arrayDataName);
    
         let dataOption = document.querySelectorAll(".options");
         
         //getting string Array of dataOption value
         dataOptionStringArray =[].map.call(dataOption, el => el.value); 
        //  console.log([].map.call(dataOption, el => el.value)) ;
        
         // converting string Array of dataOption value 2D Array of dataOption value
         let dataOptionArray = [];
         dataOptionStringArray.forEach((element)=>{
         dataOptValue = element.split(',');
          dataOptionArray.push(dataOptValue);
        });
          let f = (a, b) => [].concat(...a.map(a => b.map(b => [].concat(a, b))));
        let cartesian = (a,b, ...c) => b ? cartesian(f(a, b), ...c) : a;
        let allVariants =  cartesian(...dataOptionArray);
        // console.log(allVariants);
        //  console.log(dataName);
        //  console.log(dataOption);
        //  return false;
         var varient_pricing_edit_info ='';
         var varient_pricing_info = "";
         allVariants.forEach((element)=>{
            let variantName = element.toString();
            let price = document.getElementById('price').value;
            // console.log(variantName);
            // return false ; 
            varient_pricing_edit_info +=`<tr>
                                        <td class="checkbox-column">
                                            <label class="new-control new-checkbox checkbox-primary" style="height: 18px; margin: 0 auto;">
                                                <input type="checkbox" class="new-control-input todochkbox" id="todo-1">
                                                <span class="new-control-indicator"></span>
                                            </label>
                                        </td>
                                        <td>
                                        <p class="mb-0">${variantName}</p>
                                        </td>
                                        <td class="text-center"><input class="form-control" type="number"></td>
                                        <td class="text-center">$ ${price}</td>
                                        <td class="text-center"><input class="form-control" type="text"></td>
                                        <td class="text-center"><select class="form-control" type="text">
                                        <option value="1">Instock</option>
                                        <option value="0">Out of stock</option>
                                        </td>
                                        <td class="text-center"><input class="form-control" type="number"></td>
                                        <td class="text-center">
                                           <button class="btn btn-warning btn-sm" >Show</button>
                                        </td>
                                     </tr>`;
                varient_pricing_info  += `<tr>
                                                    <td>
                                                        <p class="mb-0">${variantName}</p>
                                                    </td>
                                                    <td>___</td>
                                                    <td>$ ${price}</td>
                                                    <td>Instock</td>

                                                    <td class="text-center">show</td>
                                                </tr>`;                   
         });
        //   console.log(varient_pricing_info);
           $('#variantPricingOption').html(varient_pricing_edit_info);
            $('#variantShow').html(varient_pricing_info);
            $('#manageVariantdiv').show();
            $('#inventoryDiv').hide();
            }
            else if($(this).prop("checked") == false){
                $( this ).val('0') ;
            console.log( $( this ).val() );
            $('#manageVariantdiv').hide();
            $('#variantShow').html('');
             $('#inventoryDiv').show();
            }
            });
        });
    </script>
    
    <script>
      function connectImgModal(){
          function isEmpty( el ){
          return !$.trim(el.html())
        }
        if (isEmpty($('#allVarients'))) {
                toastr.info('Please Add Varient');
                return false;
            }     
                    let variantName = document.querySelectorAll(".optionName");
                      variantNameStrArr =[].map.call(variantName, el => el.value); 
                    //   console.table(variantNameStrArr);
                     let variantOptios = "";
                     variantNameStrArr.forEach((element)=>{
                    variantOptios +=`<option value="${element}">${element}</option>`;
                    //   dataOptionArray.push(dataOptValue);
                    });
                    console.log(variantOptios);
                    $('#imgOption').html(variantOptios);
                    imgOptions(variantNameStrArr[0]);
                    $(".connectImgModal").modal('toggle');
                }
                
                
                // change add image on table option on change with option 
                function imgOptions(index){
               
                    // data option Array 
                   let dataOption = document.querySelectorAll(".options");
                     //getting string Array of dataOption value
                     dataOptionStrArr =[].map.call(dataOption, el => el.value); 
                    //  console.log([].map.call(dataOption, el => el.value)) ;
                    
                     // converting string Array of dataOption value 2D Array of dataOption value
                     let dataOptionArr = [];
                     dataOptionStrArr.forEach((element)=>{
                     dataOptValue = element.split(',');
                      dataOptionArr.push(dataOptValue);
                    });
                    console.log(dataOptionArr); 
                    
                          let optionName = document.querySelectorAll(".optionName");
                     //getting string Array of dataOption value
                     optionNameStrArr =[].map.call(optionName, el => el.value); 
                
                    
                    let associative_array=new Object();
                    for(let i=0;i<dataOptionArr.length;i++){
                      associative_array[optionNameStrArr[i]]=dataOptionArr[i];
                    }
                    console.log(associative_array);
                    console.table(associative_array['colour']);
                    let options = associative_array[index];
                    console.log(options);
                    console.log(options.length);
                    // return false;
                    let optionForImg = "";
                    options.forEach((element,i)=>{
                        optionForImg +=  ` <tr><td><input class="form-control optionsforImg"  name="optionsforImg[]"  value="${element}"></td><td class="">                                                <div class="custom_uploadBtn">
                                                        <div>
                                                        	<div class="input">
                                                        		<input class="form-control optionImg inputFileToLoad" id="optionImg${i}" onchange="encodeImageFileAsURL();" name="optionImg[]" type="file">
                                                        	</div>
                                                        </div>
                                                  </td>
                                                  </tr>`;
                    });
                    console.log(optionForImg);
                    $('#optionForImg').html(optionForImg);
                }
                
                
      function showVariantManagment(){
                    $(".manageVarientPricing").modal('toggle');
                }
    function showTypeField(){
        if($('#variantType').prop('checked')==true){
        $('#variantType').val('0');
        $('#forTypeColourDiv').show();
       
        $('#forTypeListDiv').hide();
   
        } 
        if($('#variantType').prop('checked')==false){
        $('#variantType').val('1');
        $('#forTypeColourDiv').hide();
    
        $('#forTypeListDiv').show();

        }
    }
    
      $(document).ready(function(){
          $('#saveVariantBtn').on('click',function(){
             let optionName = $('#optionName').val();
             let variantType = $('#variantType').val();
             if(variantType=='1'){
                 var options =$('#forTypeList').val(); 
             }
             if(variantType=='0'){ 
                 
                 var strOptions =$('#forTypeColour').val();//string of colour code and name
                //  let optionArr = explode('_',Str)
                 
             }
            console.log(optionName);
            console.log(variantType);
            console.log(options);
           
              let variantInfo = ` <div class="row  py-3">
                                               <div class="col-lg-4 col-md-4 col-6">
                                             
                                                     <h6><input type="text" class="form-control optionName" name="optionName[]" value="${optionName}"></h6>
                                               </div>
                                               <div class="col-lg-8 col-md-8 col-6">
                                                  <h6><input type="text" class="form-control options" name="options[]" value="${options}"></h6>
                                                    
                                               </div>
                                           </div>`; 
                                           console.log(variantType);
                                           $('#allVarients').append(variantInfo);
                                            $('.close').click();
          });
      });
      
              
    </script>
    
    
    <!-- script for add custom text field -->
    <script>
    var countTextField = 0;
    var textFieldDivCount = 0;
        $('document').ready(function(){
            $('#addCustomTextField').on('click',function(){
                textFieldDivCount++;
                console.log(textFieldDivCount);
               var textField = ` <div class="form-row mb-4+" id="${textFieldDivCount}div">
                                            <div class="form-group col-md-7">
                                                <label for="">Custom text field</label>
                                                <input type="text" class="form-control" id="" name="textFieldName[]"    placeholder="">
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="inputPassword4">Char limit</label>
                                                <input type="number" class="form-control" id="" name="textFieldChar[]"    placeholder="">
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label for="inputPassword4"><a href="javascript:void(0)" class="delBtn" onclick="removeTextField('${textFieldDivCount}div')" ><i class="far fa-trash-alt"></i></a></la
                                            </div>
                                        </div>`; 
                $('#CustomTextField').append(textField);
                countTextField++;
                toastr.info('Text Field Added');
                if(countTextField==2){
                $('#addCustomTextField').hide();
                }
            });
       
        
        });
          
          function removeTextField(divId){
              try {
                     $('#'+divId).remove();
                      toastr.info('Removed Successfully');
                        countTextField--;
                        if(countTextField<2){
                                 $('#addCustomTextField').show();
                        }
                        
                    }catch(err) {
                        toast.error('Not Removed Something is wrong');
                        console.log(err);
                        console.log(err.message);
                 
                    }

        }
           $( "#inventryType" ).on( "click", function() {
 
        if($(this).prop("checked")==true){
            $(this).val('1');
            console.log($(this).val());
            
            $('#selectInventry').show();
            $('#selectStatus').hide();
        }
        if($(this).prop("checked")==false){
             $(this).val('0');
            console.log($(this).val());
             $('#selectStatus').show();
            $('#selectInventry').hide();
        }

           });


    </script>
    
    <script>
    let base64String = '';
function encodeImageFileAsURL() {
    alert('1');
    let id = $(this).attr('id');
  console.log(id);
  console.log($('#'+id).val());
  return false;
    return function(){
        var file = this.files[0];
        var reader  = new FileReader();
        reader.onloadend = function () {
            cb(reader.result);
        }
        reader.readAsDataURL(file);
    }
}
// $('.inputFileToLoad').on('change', function(){
//     encodeImageFileAsURL($(this));
// });
    
  let  imgOption = "";
  let arrayOptionImgs = [];
  let arrayOption = [];
// var formData = new FormData();

// var conImgformDataCount = 0;

$('#saveConnectImg').on('click',function(){

 let option_imgs = Array.from(document.querySelectorAll('.optionImg'));
        option_imgs.forEach((element) => {
             arrayOptionImgs.push(element.value);
        });
 let optionsforImg = Array.from(document.querySelectorAll('.optionsforImg'));
        optionsforImg.forEach((element) => {
             arrayOption.push(element.value);
        });
        console.log(arrayOption);

// return false;
// optionImg=optionImg.push($('input[name="optionImg[]"]').val());
// option=option.push($('input[name="option[]"]').val());
// imgOption=$('#imgOption').val();
// console.log(optionImg);
// console.log(option);
// console.log(imgOption);

});
  
 
    
    $("form[name='product_form']").submit(function(e){
    e.preventDefault();
    var formData = new FormData(this);
    // Object.assign(formData,allformData);
    // formData.merge('allformData',formData);
    formData.append('imgOption',imgOption);
    formData.append('arrayOption',arrayOption);
    formData.append('arrayOptionImgs',arrayOptionImgs);
    formData.append('_token','{{csrf_token()}}');
    $.ajax({
        url: $(this).attr('action'),
        type: $(this).attr('method'),
        data: formData,
        dataType: 'json',
        error: function (error) {
            console.log(error);
        },
        contentType: false, // NEEDED, DON'T OMIT THIS (requires jQuery 1.6+)
        processData: false, // NEEDED, DON'T OMIT THIS
        success: function (json) {
            console.log(json);
        },
        complete: function (jqXHR, textStatus) {
         console.log(`AJAX thinks login request was a ${textStatus}`);
        }
    });
});
    
    
</script>
    <!-- end -->
    @endsection    
    
    
    
    
    
    
    
    