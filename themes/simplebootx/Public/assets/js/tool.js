/*回到顶部*/
+(function($){
  $.fn.extend({
    gotop:function(options){
      var defaults={
          topHei:500,
          speed:600,
          endfn:function(){
              $.noop();
          }
      };
      var sets= $.extend(defaults,options||{});
      var _this=$(this);
      var _scrollTop=0;

      $(window).scroll(function(){
          _scrollTop=$(this).scrollTop();
          if (_scrollTop>=sets.topHei){
              _this.fadeIn('fast');
          }else{
              _this.fadeOut('fast');
          }
      });
      _this.on("click",function(){
          $("html,body").animate({scrollTop:"0px"},sets.speed);
      });
      return $(this);
    }
  });
})(jQuery);

/*已入加类*/
+(function($){
  $.fn.extend({
    evclass:function(options){
      var defaults={
        item:"li",
        class:"on",
        evtype:"mouseover"
      };
      var sets=$.extend(defaults, options||{});
      var _this=$(this);
      _this.on(sets.evtype, sets.item, function(event) {
        event.preventDefault();
        $(this).addClass(sets.class).siblings(sets.item).removeClass(sets.class);
      });
      return $(this);   
    }
  });
  
})(jQuery);

/* ========================================================================
 * Bootstrap: collapse.js v3.3.5   展开收起
 * http://getbootstrap.com/javascript/#collapse
 * ========================================================================
 * Copyright 2011-2015 Twitter, Inc.
 * Licensed under MIT (https://github.com/twbs/bootstrap/blob/master/LICENSE)
 * ======================================================================== */
+function ($) {
  'use strict';

  // COLLAPSE PUBLIC CLASS DEFINITION
  // ================================

  var Collapse = function (element, options) {
    this.$element      = $(element)
    this.options       = $.extend({}, Collapse.DEFAULTS, options)
    this.$trigger      = $('[data-toggle="collapse"][href="#' + element.id + '"],' +
                           '[data-toggle="collapse"][data-target="#' + element.id + '"]')
    this.transitioning = null

    if (this.options.parent) {
      this.$parent = this.getParent()
    } else {
      this.addAriaAndCollapsedClass(this.$element, this.$trigger)
    }

    if (this.options.toggle) this.toggle()
  }

  Collapse.VERSION  = '3.3.5'

  Collapse.TRANSITION_DURATION = 350

  Collapse.DEFAULTS = {
    toggle: true
  }

  Collapse.prototype.dimension = function () {
    var hasWidth = this.$element.hasClass('width')
    return hasWidth ? 'width' : 'height'
  }

  Collapse.prototype.show = function () {
    if (this.transitioning || this.$element.hasClass('in')) return

    var activesData
    var actives = this.$parent && this.$parent.children('.panel').children('.in, .collapsing')

    if (actives && actives.length) {
      activesData = actives.data('bs.collapse')
      if (activesData && activesData.transitioning) return
    }

    var startEvent = $.Event('show.bs.collapse')
    this.$element.trigger(startEvent)
    if (startEvent.isDefaultPrevented()) return

    if (actives && actives.length) {
      Plugin.call(actives, 'hide')
      activesData || actives.data('bs.collapse', null)
    }

    var dimension = this.dimension()

    this.$element
      .removeClass('collapse')
      .addClass('collapsing')[dimension](0)
      .attr('aria-expanded', true)

    this.$trigger
      .removeClass('collapsed')
      .attr('aria-expanded', true)

    this.transitioning = 1

    var complete = function () {
      this.$element
        .removeClass('collapsing')
        .addClass('collapse in')[dimension]('')
      this.transitioning = 0
      this.$element
        .trigger('shown.bs.collapse')
    }

    if (!$.support.transition) return complete.call(this)

    var scrollSize = $.camelCase(['scroll', dimension].join('-'))

    this.$element
      .one('bsTransitionEnd', $.proxy(complete, this))
      .emulateTransitionEnd(Collapse.TRANSITION_DURATION)[dimension](this.$element[0][scrollSize])
  }

  Collapse.prototype.hide = function () {
    if (this.transitioning || !this.$element.hasClass('in')) return

    var startEvent = $.Event('hide.bs.collapse')
    this.$element.trigger(startEvent)
    if (startEvent.isDefaultPrevented()) return

    var dimension = this.dimension()

    this.$element[dimension](this.$element[dimension]())[0].offsetHeight

    this.$element
      .addClass('collapsing')
      .removeClass('collapse in')
      .attr('aria-expanded', false)

    this.$trigger
      .addClass('collapsed')
      .attr('aria-expanded', false)

    this.transitioning = 1

    var complete = function () {
      this.transitioning = 0
      this.$element
        .removeClass('collapsing')
        .addClass('collapse')
        .trigger('hidden.bs.collapse')
    }

    if (!$.support.transition) return complete.call(this)

    this.$element
      [dimension](0)
      .one('bsTransitionEnd', $.proxy(complete, this))
      .emulateTransitionEnd(Collapse.TRANSITION_DURATION)
  }

  Collapse.prototype.toggle = function () {
    this[this.$element.hasClass('in') ? 'hide' : 'show']()
  }

  Collapse.prototype.getParent = function () {
    return $(this.options.parent)
      .find('[data-toggle="collapse"][data-parent="' + this.options.parent + '"]')
      .each($.proxy(function (i, element) {
        var $element = $(element)
        this.addAriaAndCollapsedClass(getTargetFromTrigger($element), $element)
      }, this))
      .end()
  }

  Collapse.prototype.addAriaAndCollapsedClass = function ($element, $trigger) {
    var isOpen = $element.hasClass('in')

    $element.attr('aria-expanded', isOpen)
    $trigger
      .toggleClass('collapsed', !isOpen)
      .attr('aria-expanded', isOpen)
  }

  function getTargetFromTrigger($trigger) {
    var href
    var target = $trigger.attr('data-target')
      || (href = $trigger.attr('href')) && href.replace(/.*(?=#[^\s]+$)/, '') // strip for ie7

    return $(target)
  }


  // COLLAPSE PLUGIN DEFINITION
  // ==========================

  function Plugin(option) {
    return this.each(function () {
      var $this   = $(this)
      var data    = $this.data('bs.collapse')
      var options = $.extend({}, Collapse.DEFAULTS, $this.data(), typeof option == 'object' && option)

      if (!data && options.toggle && /show|hide/.test(option)) options.toggle = false
      if (!data) $this.data('bs.collapse', (data = new Collapse(this, options)))
      if (typeof option == 'string') data[option]()
    })
  }

  var old = $.fn.collapse

  $.fn.collapse             = Plugin
  $.fn.collapse.Constructor = Collapse


  // COLLAPSE NO CONFLICT
  // ====================

  $.fn.collapse.noConflict = function () {
    $.fn.collapse = old
    return this
  }


  // COLLAPSE DATA-API
  // =================

  $(document).on('click.bs.collapse.data-api', '[data-toggle="collapse"]', function (e) {
    var $this   = $(this)

    if (!$this.attr('data-target')) e.preventDefault()

    var $target = getTargetFromTrigger($this)
    var data    = $target.data('bs.collapse')
    var option  = data ? 'toggle' : $this.data()

    Plugin.call($target, option)
  })

}(jQuery);


//命名空间


/*bebetops命名空间*/
var bebetops=window.bebetops||{};

//定义常量
bebetops.constant={

}

//bebetops的cookie操作
bebetops.cookie={
  add:function(objName,objValue,objHours){
        var str = objName + "=" + escape(objValue);
        if(objHours !=0)
        {
            var date = new Date();
            var ms = objHours*3600*1000;
            date.setTime(date.getTime() + ms);
            str += "; expires=" + date.toGMTString();
            str += "; path=/";
        }
        document.cookie = str;
    },
    del:function(cname){
        var date = new Date();
        date.setTime(date.getTime() - 10000);
        document.cookie = cname + "=a; expires=" + date.toGMTString();
    },
    get:function(c_name){
        if (document.cookie.length>0)
        {
            c_start=document.cookie.indexOf(c_name + "=")
            if (c_start!=-1)
            {
                c_start=c_start + c_name.length+1
                c_end=document.cookie.indexOf(";",c_start)
                if (c_end==-1) c_end=document.cookie.length
                return unescape(document.cookie.substring(c_start,c_end))
            }
            return false;
        }
        return false;
    }
}

//bebetops公共函数库
bebetops.common={
  //下拉加载
  /*
  *解释该绑定：$(window).off('scroll.add');
  */
  addByScroll:function(obj,btmHei,fn){
      var winHei=$(window).height(),
          objOffsetTop=$(obj).offset().top,
          objInitHei;

      $(window).on('scroll.add', function(event) {
        objInitHei=$(obj).height(); 
        if (winHei+$(this).scrollTop()-objOffsetTop-objInitHei>=btmHei) { //底部条件判断
            fn();    //回调函数,自定义ajax异步加载数据函数
         }
      });
  },

  /*
  *时间转换函数 
  */
  timeFormat:function(starTimeStamp,endTimeStamp){
    var seconds=parseInt((endTimeStamp-starTimeStamp)/1000);
    var result='';  //返回结果
    if (seconds<=0) {
      return false;
    }else if(seconds<60){
      result='just now';
    }else{
      var days = parseInt(seconds/(3600*24));
      if (days>3) {  //三天前直接显示日期
        var date = new Date(starTimeStamp);  
        var y = date.getFullYear();    
        var m = date.getMonth() + 1;    
            m = m < 10 ? ('0' + m) : m;    
        var d = date.getDate();  
        result =y+'-'+m+'-'+d;

      }else if(days>=1){ //超过一天显示几天前
        result=days+"days before"  

      }else{     //几小时几分前

        var hh = parseInt(seconds/3600);  
        if(hh<10) hh = "0" + hh; //补一个0        
        var mm = parseInt((seconds-hh*3600-days*3600*24)/60); 
        if(mm<10) mm = "0" + mm;  
         
        if (hh==0) {
          result = mm +"mins before";
        }else{
          result = hh +"hours "+ mm +"mins before";
        }
          
      }
    }     
    return result;
  }
}