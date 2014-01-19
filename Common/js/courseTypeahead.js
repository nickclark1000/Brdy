$('.twitter-typeahead').typeahead({
    name: 'Some name',
    local: ['Brampton Golf Club', 'Royal Ontario', 'Moncton Golf and Country Club', 'Royal Oaks Golf Club']
})
$('.twitter-typeahead.input-sm').siblings('input.tt-hint').addClass('hint-small');
$('.twitter-typeahead.input-lg').siblings('input.tt-hint').addClass('hint-large'); 