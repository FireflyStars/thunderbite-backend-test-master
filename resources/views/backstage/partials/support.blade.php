@if( app()->environment() === 'production' )
    <script>
        window.fwSettings={
            'widget_id':36000000116
        };
        !function(){if("function"!=typeof window.FreshworksWidget){var n=function(){n.q.push(arguments)};n.q=[],window.FreshworksWidget=n}}()
    </script>
    <script type='text/javascript' src='https://widget.freshworks.com/widgets/36000000116.js' async defer></script>
@endif
