function date_time(id)
{
        date = new Date;
        year = date.getFullYear();
        month = date.getMonth();
        months = new Array('January', 'February', 'March', 'April', 'May', 'June', 'Jully', 'August', 'September', 'October', 'November', 'December');
        d = date.getDate();
        day = date.getDay();
        days = new Array('Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday');
        var now    = new Date();
        var hour   = now.getHours();
        var minute = now.getMinutes();
        var second = now.getSeconds();
        var ap = "AM";
        if (hour   > 11) { ap = "PM";             }
        if (hour   > 12) { hour = hour - 12;      }
        if (hour   == 0) { hour = 12;             }
        if (hour   < 10) { hour   = "0" + hour;   }
        if (minute < 10) { minute = "0" + minute; }
        if (second < 10) { second = "0" + second; }
        

        result =  ''+hour+ ':' + minute + ':' + second + " " + ap;
        document.getElementById(id).innerHTML = result;
        setTimeout('date_time("'+id+'");','1000');
        return true;
}