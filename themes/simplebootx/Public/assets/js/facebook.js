/*Facebook Conversion Code for GOW -Tier 1  */



(function() {
  var _fbq = window._fbq || (window._fbq = []);
  if (!_fbq.loaded) {
    var fbds = document.createElement('script');
    fbds.async = true;
    fbds.src = '//connect.facebook.net/en_US/fbds.js';
    var s = document.getElementsByTagName('script')[0];
    s.parentNode.insertBefore(fbds, s);
    _fbq.loaded = true;
  }
})();
window._fbq = window._fbq || [];
window._fbq.push(['track', '6034957155480', {'value':'0.00','currency':'USD'}]);



/*<img height="1" width="1" alt="" style="display:none" src="https://www.facebook.com/tr?ev=6034957155480&amp;cd[value]=0.00&amp;cd[currency]=USD&amp;noscript=1" />
*/








function go_to(){
  var cid = getPar('cid');
  var subid = getPar('subid');
    var subid2 = getPar('subid2');
    var videoid = getPar('video');
  var url ="signup.php?cid="+cid+"&subid="+subid+"&subid2="+subid2+"&videoid="+videoid;
  window.location.href=url;
}
