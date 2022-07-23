function change_product_color_image(image,id)
{
    document.getElementById("color_id").value=id;
    jQuery('.zoompro-span').html('<img class="blur-up lazyload zoompro" data-zoom-image="'+image+'" alt="" src="'+image+'" />')
}
/*

function quick_view(image,mrp)
{
    var price=mrp;
    var html='<div class="modal-body"><div id="ProductSection-product-template" class="product-template__container prstyle1"><div class="product-single"><a href="javascript:void()" data-dismiss="modal" class="model-close-btn pull-right" title="close"><span class="icon icon anm anm-times-l"></span></a><div class="row"><div class="col-lg-6 col-md-6 col-sm-12 col-12"><div class="product-details-img"><div class="pl-20"><img src="'+image+'" alt="" /></div></div></div><div class="col-lg-6 col-md-6 col-sm-12 col-12"><div class="product-single__meta"><h2 class="product-single__title">"kus"</h2><div class="prInfoRow"><div class="product-stock"> <span class="instock ">In Stock</span><span class="outstock hide">Unavailable</span> </div><div class="product-sku">SKU: <span class="variant-sku">19115-rdxs</span></div></div><p class="product-single__price product-single__price-product-template"><span class="visually-hidden">Regular price</span><span id="ComparePrice-product-template"><span class="money">$700.00</span></span><span class="product-price__price product-price__price-product-template product-price__sale product-price__sale--single"><span id="ProductPrice-product-template"><span class="money">$'+price+'.00</span></span></span></p><div class="product-single__description rte">"desc"</div></div></div></div></div></div></div></div></div>';
    jQuery('.modal-content').html(html);
    
    
    
}
$('*[data-target="#content_quickview"]').click(function(){

    var image=$('#image').val();
    var name=$('#name').val();
    var short_desc=$('#short_desc').val();
    var mrp=$('#mrp').val();
    var price=$('#price').val();
    var html='<div class="modal-body"><div id="ProductSection-product-template" class="product-template__container prstyle1"><div class="product-single"><a href="javascript:void()" data-dismiss="modal" class="model-close-btn pull-right" title="close"><span class="icon icon anm anm-times-l"></span></a><div class="row"><div class="col-lg-6 col-md-6 col-sm-12 col-12"><div class="product-details-img"><div class="pl-20"><img src="'+image+'" alt="" /></div></div></div><div class="col-lg-6 col-md-6 col-sm-12 col-12"><div class="product-single__meta"><h2 class="product-single__title">"kush"</h2><div class="prInfoRow"><div class="product-stock"> <span class="instock ">In Stock</span><span class="outstock hide">Unavailable</span> </div><div class="product-sku">SKU: <span class="variant-sku">19115-rdxs</span></div></div><p class="product-single__price product-single__price-product-template"><span class="visually-hidden">Regular price</span><span id="ComparePrice-product-template"><span class="money">$'+price+'.00</span></span><span class="product-price__price product-price__price-product-template product-price__sale product-price__sale--single"><span id="ProductPrice-product-template"><span class="money">$'+mrp+'.00</span></span></span></p><div class="product-single__description rte">"'+short_desc+'"</div></div></div></div></div></div></div></div></div>';
    jQuery('.modal-content').html(html);
})*/
function add_to_cart(id)
{
    var pid=id;
    var color_id=document.getElementById('color_id').value;
    var qty=document.getElementById('pqty').value;
    if(color_id==''){
        jQuery('#add_to_cart_msg').html('<div class="sufee-alert alert with-close alert-danger alert-dismissible fade show "><a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>Please select color</div>');
    }else
    {
        document.getElementById("qty").value=qty;
        document.getElementById("product_id").value=pid;
        jQuery.ajax({
            url:'/add_to_cart',
            data:jQuery('#frmAddToCart').serialize(),
            type:'post',
            success:function(result){
                $('.add').remove();
                add_add_to_cart(pid)
            }
        })
    }
    

    
}

function add_add_to_cart(pid)
{
    var html='';
    document.getElementById("add_add_id").value=pid;
    jQuery.ajax({
        url:'/add_add_to_cart',
        data:jQuery('#addaddtocart').serialize(),
        type:'post',
        success:function(result){
            if(result.msg=="success")
            {
                html+='<hr><li class="item{{$list->id}}"><a class="product-image" href="#"><img src="/storage/media/product/'+result.image+'" alt="'+result.name+'" title="" /></a><div class="product-details"><a href="javascript:void(0)" onclick="remove_add_to_cart('+result.id+')" class="remove"><i class="anm anm-times-l" aria-hidden="true"></i></a>'+result.name+'<div class="wrapQtyBtn"><div class="qtyField"><span class="label">Qty:</span><a class="qtyBtn minus" href="javascript:void(0);" onclick="minus_add_to_cart('+result.id+')"><i class="fa anm anm-minus-r" aria-hidden="true"></i></a><input type="text" id="Quantity" name="quantity" value="'+result.qty+'" class="product-form__input qty"><a class="qtyBtn plus" onclick="plus_add_to_cart('+result.id+')" href="javascript:void(0);"><i class="fa anm anm-plus-r" aria-hidden="true"></i></a></div></div><div class="priceRow"><div class="product-price"><span class="money"> &#8377;'+result.price+'</span></div></div></div></li>';
                
                $('#main_pop').html(html);
                $('#CartCount').html(result.total);
                $('#money').html(' &#8377;'+result.mrp);
            }
        }
    })
}

function remove_add_to_cart(id)
{
    document.getElementById("add_id").value=id;
    jQuery.ajax({
        url:'/remove_add_to_cart',
        data:jQuery('#removeAddToCart').serialize(),
        type:'post',
        success:function(result){
            if(result.msg=="success")
            {
                $('.item'+id).remove();
                $('#CartCount').html(result.total);
                $('#money').html(' &#8377;'+result.mrp);
                
            }
        }
    })
}
function minus_add_to_cart(id)
{
    document.getElementById("minus_id").value=id;
    jQuery.ajax({
        url:'/minus_add_to_cart',
        data:jQuery('#minusaddtocart').serialize(),
        type:'post',
        success:function(result){
            if(result.msg=="success")
            {
                $('.money').html(result.mrp);
                $('#money1').html(' &#8377;'+result.mrp);
                $('#price'+id).html(' &#8377;'+result.price);
            }
            else{
                $('.item'+id).remove();
                $('#CartCount').html(result.total);
                $('.money'+id).html(' &#8377;'+result.mrp);
                $('#money1').html(' &#8377;'+result.mrp);
                
            }
        }
    })
}

function plus_add_to_cart(id)
{
    document.getElementById("plus_id").value=id;
    jQuery.ajax({
        url:'/plus_add_to_cart',
        data:jQuery('#plusaddtocart').serialize(),
        type:'post',
        success:function(result){
            if(result.msg=="success")
            {
                $('#price'+id).html(' &#8377;'+result.price);
                $('#money').html(' &#8377;'+result.mrp);
                $('#money1').html(' &#8377;'+result.mrp);
            }
        }
    })
}

function coupon_code()
{
    var couponcode=document.getElementById('coupon').value;
    document.getElementById("coupon_code").value=couponcode;
    jQuery.ajax({
        url:'/coupon_code',
        data:jQuery('#couponcode').serialize(),
        type:'post',
        success:function(result){
            if(result.msg=="success")
            {
                jQuery('#add_to_cart_msg').html('<div class="sufee-alert alert with-close alert-success alert-dismissible fade show "><a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>Coupon Code applyed</div>');
                $('#money1').html(' &#8377;'+result.mrp);
                $('#TAX').html(' &#8377;'+result.tax);
                $('#GT').html(' &#8377;'+result.grand_total);
            }
            else if(result.msg=="error")
            {
                jQuery('#add_to_cart_msg').html('<div class="sufee-alert alert with-close alert-danger alert-dismissible fade show "><a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>Please Shop above 1000 rs</div>');
            }
            else
            {
                jQuery('#add_to_cart_msg').html('<div class="sufee-alert alert with-close alert-danger alert-dismissible fade show "><a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>Please Enter valid Coupon Code</div>');
            }
        }
    })

    
}
function add_to_cart_pop(pid,pattrid)
{
    document.getElementById("color_id").value=pattrid;
    document.getElementById("qty").value=1;
    document.getElementById("product_id").value=pid;
    jQuery.ajax({
        url:'/add_to_cart',
        data:jQuery('#frmAddToCart').serialize(),
        type:'post',
        success:function(result){
            $('.add'+pid).remove();
            add_add_to_cart(pid)
        }
    })
}

function wishlist(pid)
{
    document.getElementById("wishilist_id").value=pid;
    jQuery.ajax({
        url:'/wishlist',
        data:jQuery('#wishilist').serialize(),
        type:'post',
        success:function(result){
            $('.wishlist'+pid).remove();
        }
    })
}

function remove_wishlist(pid)
{
    document.getElementById("removewishlist").value=pid;
    jQuery.ajax({
        url:'/removewishlist',
        data:jQuery('#removewishlist').serialize(),
        type:'post',
        success:function(result){
            $('.wishlist'+pid).remove();
        }
    })
}