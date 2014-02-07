@section("include/person/navigation")
    <a href="{{ URL::route("person/index") }}">active ()</a> |
    <a href="{{ URL::route("person/deceased") }}">deceased ()</a> |
    <a href="{{ URL::route("person/deleted") }}">deleted ()</a>
@show