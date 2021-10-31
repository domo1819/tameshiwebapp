$(function(id) {
    function change(s) {
    var i, n, sel = s.selectedIndex;
    for (i = 0; i<s.options.length; i++) {
    n = document.getElementById(s.options[i].value);
    if (n) n.style.display = i == sel?"block":"none";
    }
    }
    
    var a = document.getElementById(id);
    change(a);
    a.onchange = function() { change(this); };
    
    })("dealer");