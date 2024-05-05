<script src="{{ asset('js/app.js') }}" defer>
    
</script>
<script> 
window.User = {
    id:{{ auth()->check() ? auth()->user()->id : null }}
}

 </script>

<script src="{{asset('js/app.js')}}"></script>

</body>
</html>
