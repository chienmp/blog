@component('mail::message')
# Introduction

New Post!!!
Chúng tôi vừa thêm 1 bài viết mới bạn có thể ấn vào link để xem

@component('mail::button', ['url' => 'http://localhost:8000/'])
Link
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
