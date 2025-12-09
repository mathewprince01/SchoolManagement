<x-mail::message>
# Result's Are Out Now

# Dear **{{$student->full_name}}**,
#    Your Results for **{{$mark->exam->exam_name}}** are out now
#    Please Visit our Website for more Details,
#             Thank You



{{-- <x-mail::button :url="''">
Button Text
</x-mail::button> --}}

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
