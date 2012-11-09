//put globally used funcitons in this file.


$(function() {
  
  Footer.init();

});

var Footer = {
  init: function() {
    $('#menuButton').on('click', Footer.showMenu);
  },
  
  showMenu: function(e) {
    e.preventDefault();
    var url = $('#baseUrl').attr('href') + '/index.php/site/popupMenu';
    $.post(url, {}, function(result) {
    
			Message.popup(result);
    
    }).error(function(request, error, status) {
      alert('There was an error during retreival of the Menu.', false);
    });
  }
  

};

var Message = {
  //info on the simplemodal dialog here:
  //http://www.ericmmartin.com/projects/simplemodal/
  'popup' : function(content, extraOptions) {
    extraOptions = extraOptions || {};
    
    if (content !== null) {
      $('#popupModal').html(content);
    }
    $('#popupModal').modal($.extend(true, {
      overlayClose:true,
      //fancy slide down opening. Takes a second longer to load
      onOpen: function (dialog) {
        dialog.overlay.fadeIn(100, function () {
          dialog.container.slideDown(200, function () {
            dialog.data.fadeIn(200);
          });
        });
      },
      overlayCss: {
        backgroundColor:"#666",
        borderColor:"#666"
      },
      //added the 3 lines below instead of the commented out one since the modal was hiding behind the top banner.
      //also because the modal was hidden when the browser was too small
      autoPosition: true,
      autoResize: true,
      zIndex: 2000,
      //position: [110,],
      onClose: function(dialog) {
        $.modal.close();
        $('#popupModal').html("");
        $('#popupModal').removeClass();
      }
    }, extraOptions));
  },
  
  'alert' : function (message, extraOptions) {
    var alertButton="<div class='buttons'><button class='yes'>Ok</button></div>" +
    "<style>.yes {width:75px; margin: 5px; float: right;} .buttons {height:35px; width:100%;}</style>";
    $.template( "alertButton", alertButton );
  
    $.tmpl( "alertButton", {}).appendTo(message);
    
    
    var alertOptions = $.extend({overlayClose:false,
      onShow: function (dialog) {
          var modal = this;

          // if the user clicks "yes"
          $('.yes').click(function () {
            // close the dialog
            modal.close(); // or $.modal.close();
          });
      }
    }, extraOptions);
    
    Telonium.Message.popup(message, alertOptions);
  },
  
  'alertResult' : function(message, status, listItems) {
    listItems = listItems || {};
    
    var flashDiv = Telonium.UIHelper.createMessagesList(listItems, message);
    $(flashDiv).attr('style', 'min-width: 400px;');
    
    var extraOptions = {containerCss : Telonium.Message.cssPopupOptionsByStatus(status)};
    if (status === true) {
      $.extend(extraOptions, {overlayClose:true});
    }
    Telonium.Message.alert(flashDiv, extraOptions);
  },
  
  'cssPopupOptionsByStatus' : function(status) {

    var cssOptions = null;
    if (status === true) {
      cssOptions = {border: "3px solid #84BB44",
        background: "#F3FFEB",
        color: "#5B5943"
      };
    }
    else if (status === false) {
      cssOptions = {border: "3px solid #cd0a0a",
        background: "#fef1ec url(images/ui-bg_inset-soft_95_fef1ec_1x100.png) 50% bottom repeat-x",
        color: "#cd0a0a"
      };
    }
    else {
      cssOptions = {border: "3px solid #5B5943",
        background: "#FFFDDD",
        color: "#5B5943"
      };
    }
    return cssOptions;
  },
}

