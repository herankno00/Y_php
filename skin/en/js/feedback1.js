'use strict';

function ownKeys (e, t) {
  var n,
    r = Object.keys(e);
  return Object.getOwnPropertySymbols && (n = Object.getOwnPropertySymbols(e), t && (n = n.filter(function (t) {
    return Object.getOwnPropertyDescriptor(e, t).enumerable;
  })), r.push.apply(r, n)), r;
}

function _objectSpread (e) {
  for (var t = 1; t < arguments.length; t++) {
    var n = null != arguments[t] ? arguments[t] : {};
    t % 2 ? ownKeys(Object(n), !0).forEach(function (t) {
      _defineProperty(e, t, n[t]);
    }) : Object.getOwnPropertyDescriptors ? Object.defineProperties(e, Object.getOwnPropertyDescriptors(n)) : ownKeys(Object(n)).forEach(function (t) {
      Object.defineProperty(e, t, Object.getOwnPropertyDescriptor(n, t));
    });
  }

  return e;
}

function _defineProperty (t, e, n) {
  return e in t ? Object.defineProperty(t, e, {
    value: n,
    enumerable: !0,
    configurable: !0,
    writable: !0
  }) : t[e] = n, t;
}

var fbtip, sendData;

function clearForm () {
  $('#in-name').val(''), $('#in-email').val(''), $('#in-content').val(''), $('#in-phone').val(''), $('#in-title').val(''), $('#in-company').val('');
  localStorage.clear("productCachePC");
}

function sendInquiry () {
  var t = formValidated();

  if ($(this).attr('disabled', 'disabled'), t) {
    var e,
      n = {
        email: $.trim($('#in-email').val()),
        name: $.trim($('#in-name').val()),
        phone: $.trim($('#in-phone').val()),
        content: $.trim($('#in-content').val()),
        title: $.trim($('#in-title').val()),
        proId: $.trim($('#productID').val()),
        company: $.trim($('#in-company').val())
      };

    for (e in n) {
      n[e] = escape(n[e]);
    }

    var r = [],
      t = localStorage.getItem('productCachePC');
    '[]' != t && null != t && (r = JSON.parse(t));
    var a = '';
    r.forEach(function (t) {
      a = '' == a ? t.id : a + ',' + t.id;
    }), $.ajax({
      type: 'POST',
      url: '/OutOpen/AddInquiry',
      data: _objectSpread(_objectSpread({}, n), {}, {
        pageUrl: document.URL,
        proidlist: a
      }),
      dataType: 'json',
      error: function error () {
        toastr.error($lang.msgSendFailed);
      },
      success: function success (t) {
        $(this).removeAttr('disabled', 'disabled'), '1' == t ? (toastr.success($lang.msgSendSucess), clearForm()) : '2' == t ? toastr.info($lang.msgSameContent) : '3' == t ? location.href = '/Code' : '4' == t ? toastr.info($lang.msgSensitiveContent) : '5' == t ? toastr.info($lang.msgtoolongcontent) : '-1' == t ? toastr.info($lang.msgFrequentlyContent) : toastr.info($lang.msgSendFailed);
      },
      async: !1
    });
  }

  return !1;
}

function showAlert (t) {
  768 < $(window).width() ? (clearInterval(fbtip), $('#feedback-title').text(window.location.host), $('#feedback-text').text(t), $('.feedback-tips').fadeIn(200), fbtip = setInterval(closefeedbackTips, 3e3)) : alert(t);
}

function closefeedbackTips () {
  $('.feedback-tips').fadeOut(200);
}

function formValidated () {
  var t = !0;
  return $('.inquiry-form input, .inquiry-form textarea').each(function () {
    $(this).validate() || (t = !1);
  }), t;
}

var defaultreplyUrl = "";
var defaultlang = "af";

function getDefaultreplyKey () {
  $.ajax({
    url: '/OutOpen/GetInquiryReturn',
    type: 'get',
    dataType: 'json',
    success: function (data) {
      defaultlang = data.languagekey;
      var IsPersonal = data.IsPersonal;
      var cussiteid = data.cussiteid;
      if (IsPersonal == true) {
        defaultreplyUrl = "/js/" + cussiteid + "/defaultreply.json";
      } else {
        defaultreplyUrl = "/js/Inquiry/defaultreply.json";
      }
      
      getDefaultreplyList();
      // IsPersonalInquiryReply
      var IsPersonalInquiryReply = data.IsPersonalInquiryReply;
      if (IsPersonalInquiryReply == false) {
        $('#feedbackForm .select-menu').remove();
      }
      //
    },
    error: function () {
      $('#feedbackForm .select-menu').remove();
      console.log('error');
    }
  });
}

function getDefaultreplyList () {
  $.ajax({
    url: defaultreplyUrl,
    type: 'get',
    dataType: 'json',
    success: function (data) {
      var wmkcdefaultreply = data;
      var contentValue = null;

      for (var i = 0; i < wmkcdefaultreply.length; i++) {
        if (wmkcdefaultreply[i].lang === defaultlang) {
          contentValue = wmkcdefaultreply[i];
          break;
        }
      }
      $('#feedbackForm .select-menu-input').attr('placeholder', contentValue.DefaultPrompt);
      $("#in-select").empty();

      if (contentValue.content.length === 0) {
        $('#feedbackForm .select-menu').remove();
      } else {
        $.each(contentValue.content, function (index, value) {
          var listItem = "<li>" + value + "</li>";
          $("#in-select").append(listItem);
        });
      }
    },
    error: function () {
      $('#feedbackForm .select-menu').remove();
      console.log('error');
    }
  });
}


$(function () {
  if ($('#feedbackForm').length > 0) {
    $('#feedbackForm').append("<div class=\"send-inquiry default\"><form class=\"inquiry-form\"><input type=\"text\" id=\"in-name\" placeholder=\""
      .concat($lang.tdName, "\"> <input type=\"text\" id=\"in-email\" class=\"require\" placeholder=\"")
      .concat($lang.tdEmail, "&#42;\"> <div class=\"select-menu\"><div class=\"select-menu-div\"><input id=\"No1\" id=\"No1\" readonly class=\"select-menu-input\" value=\"")
      .concat($lang.defaultprompt, "\"><em class=\"\"></em></div><ul class=\"select-menu-ul\" id=\"in-select\"></ul></div>  <textarea id=\"in-content\" cols=\"30\" rows=\"10\" class=\"require\" placeholder=\"").concat($lang.tdContent, "&#42;\"></textarea></form><div class=\"send-btn hvr-icon-wobble-horizontal hvr-bounce-to-right-y\"><div class=\"span\">")
      .concat($lang.btnSubmit, "</div><div class=\"span\"><i class=\"iconfont icon-angle-right hvr-icon\" aria-hidden=\"true\"></i></div></div></div>"));
  }
  getDefaultreplyKey();
  $('.inquiry-form input, .inquiry-form textarea').on('blur', function () {
    $(this).validate();
  }), $('.send-inquiry .send-btn').on('click', function () {
    sendInquiry();
  });
}), $.fn.validate = function () {
  var t = !0,
    e = $(this).attr('id'),
    n = $(this).val();
  return 'in-email' == e ? '' === n ? (t = !1, $(this).addClass('input-error'), toastr.warning($lang.msgInputEmail)) : /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/.test(n) ? $(this).removeClass('input-error') : (t = !1, $(this).addClass('input-error'), toastr.warning($lang.msgCheckEmail)) : 'in-name' == e ? 400 < n.length ? (toastr.warning($lang.msgTooLongName), $(this).addClass('input-error'), t = !1) : $('in-name').removeClass('input-error') : 'in-content' == e ? '' === n ? (toastr.warning($lang.msgInputContent), $(this).addClass('input-error'), t = !1) : 2e3 < n.length ? (toastr.warning($lang.msgTooLongContent), $(this).addClass('input-error'), t = !1) : $(this).removeClass('input-error') : 'in-title' == e && (340 < n.length ? (toastr.warning($lang.msgTooLongTitle), $(this).addClass('input-error'), t = !1) : $(this).removeClass('input-error')), t;
};


$(function () {
  selectMenu(0);
  selectMenu(1);

  function selectMenu (index) {
    $(".select-menu-div").eq(index).on("click", function (e) {
      e.stopPropagation();
      if ($(".select-menu-ul").eq(index).css("display") === "block") {
        $(".select-menu-ul").eq(index).hide();
        $(".select-menu-div").eq(index).find("em").removeClass("select-menu-i");
        $(".select-menu-ul").eq(index).animate({
          marginTop: "20px",
          opacity: "0"
        }, "fast");
      } else {
        $(".select-menu-ul").eq(index).show();
        $(".select-menu-div").eq(index).find("em").addClass("select-menu-i");
        $(".select-menu-ul").eq(index).animate({
          marginTop: "5px",
          opacity: "1"
        }, "fast");
      }
      for (var i = 0; i < $(".select-menu-ul").length; i++) {
        if (i !== index && $(".select-menu-ul").eq(i).css("display") === "block") {
          $(".select-menu-ul").eq(i).hide();
          $(".select-menu-div").eq(i).find("em").removeClass("select-menu-i");
          $(".select-menu-ul").eq(i).animate({
            marginTop: "20px",
            opacity: "0"
          }, "fast");
        }
      }

    });
    $(".select-menu-ul").eq(index).on("click", "li", function () {
      $('#in-content').val($(this).html());

      $(".select-menu-div").eq(index).click();
      $(this).siblings(".select-this").removeClass("select-this");
      $(this).addClass("select-this");
    });
    $("#feedbackForm").on("click", function (event) {
      event.stopPropagation();
      if ($(".select-menu-ul").eq(index).css("display") === "block") {
        console.log(1);
        $(".select-menu-ul").eq(index).hide();
        $(".select-menu-div").eq(index).find("i").removeClass("select-menu-i");
        $(".select-menu-ul").eq(index).animate({
          marginTop: "20px",
          opacity: "0"
        }, "fast");

      }

    });

  }

})