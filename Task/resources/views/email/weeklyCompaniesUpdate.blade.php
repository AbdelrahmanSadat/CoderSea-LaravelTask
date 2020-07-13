Hello Admin,

@if(count($companies)>0)
The new Companies that were added this week are:
<ul class="list-group">
    @foreach($companies as $company)
    <li class="list-group-item">{{$company->name}}</li>
    @endforeach
</ul>
@else
There were no new companies added this week.
@endif