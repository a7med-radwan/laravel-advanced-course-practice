<!DOCTYPE html>
<html lang="en">

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>Contact Us</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>

<body>

    <div class="container mt-5">
        <h1 class="text-center">Contact Us</h1>
        <div class="row justify-content-center">
            <div class="col-md-6 mb-5">
                @include('forms.errors')
                <form action="{{ route('contact_us_data') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control" placeholder="Name"
                            value="{{ old('name') }}">
                    </div>

                    <div class="mb-3">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" placeholder="Email"
                            value="{{ old('email') }}">
                    </div>

                    <div class="mb-3">
                        <label>Image</label>
                        <input type="file" name="image" class="form-control" accept=".png,.jpeg,.jpg">
                    </div>

                    <div class="mb-3">
                        <label>Message</label>
                        <textarea name="message" class="form-control" rows="5" placeholder="Message">{{ old('message') }}</textarea>
                    </div>
                    <div class="text-center">
                        <button class="btn btn-primary mt-2 px-5">Send</button>
                    </div>
                </form>
            </div>

            <div class="col-md-12">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d5395.598945532996!2d34.44676154258377!3d31.51877414852553!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14fd7f2049dc0537%3A0x8ac6e676a763d5f3!2z2YXYs9is2K8g2KfZhNmD2YbYsg!5e0!3m2!1sar!2s!4v1773697828733!5m2!1sar!2s"
                    width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </div>

</body>

</html>
