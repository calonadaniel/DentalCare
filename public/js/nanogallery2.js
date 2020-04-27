    $("#nanogallery2").nanogallery2({
      thumbnailWidth:  '150 XS150 LA300 XL500',
      thumbnailHeight: '200 XS200 LA350 XL550',
      thumbnailSelectable:true,
      //thumbnailHoverEffect2: 'toolsAppear|labelSlideUp|imageScale150',
      thumbnailHoverEffect2:  null,
      thumbnailBorderVertical: '0',
      thumbnailBorderHorizontal: '0',
      thumbnailDisplayTransition: 'none',
      thumbnailDisplayOutsideScreen:'false',
      //galleryDisplayMode: 'rows', 
      //galleryDisplayMoreStep: '2',
      thumbnailSliderDelay: '0',
      //galleryPaginationMode: 'dots',
      //galleryMaxRows: '2',     
      thumbnailLabel: {
        display: false
      },
      viewerToolbar:    {
        standard:  '',
        minimized: '', 
      },
      viewerTools:    {
        topLeft:   'playPauseButton',
        topRight:  'rotateLeft,rotateRight, fullscreenButton,closeButton' 
      },
      icons: {
        thumbnailSelected:            '<i class="fas fa-trash-alt"></i>',          // selected icon
        thumbnailUnselected:          '<i class="far fa-circle"></i>' ,   // unselected icon  
      },
       
      });   
      
// delete selection
jQuery('#btn_del').on('click', function() {
  var ngy2data = $("#nanogallery2").nanogallery2('data');
  console.log(ngy2data);
  ngy2data.items.forEach( function(item) {
    if( item.selected ) {
      console.log(item.customData);
      $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        },
        type: 'POST',
        url: 'fotos-delete',
        data: {filename: item.customData},
        success: function () {
            console.log("File has been successfully removed!!");
        },
        error: function (e) {
            console.log(e);
        }
    });
      item.delete();
    }
  });
  $("#nanogallery2").nanogallery2('resize');
});

// switch selection mode on/off en teoria no lo ocupo
jQuery('#btn_select_mode').on('click', function() {
  var b = !$('#nanogallery2').nanogallery2('option', 'thumbnailSelectable');
  $('#nanogallery2').nanogallery2('option', 'thumbnailSelectable', b);
});