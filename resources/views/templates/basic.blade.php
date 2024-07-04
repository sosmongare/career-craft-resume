<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resume</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            color: #333;
        }
        .resume-header {
            text-align: center;
            margin-bottom: 20px;
        }
        .resume-header h1 {
            font-size: 2em;
            margin-bottom: 10px;
        }
        .resume-header p {
            margin-bottom: 5px;
        }
        .section-title {
            font-size: 1.5em;
            color: #007bff;
            border-bottom: 2px solid #007bff;
            padding-bottom: 5px;
            margin-top: 20px;
            margin-bottom: 10px;
        }
        .section-content {
            margin-bottom: 20px;
        }
        .list-item {
            margin-bottom: 10px;
        }
        .list-item h3 {
            margin: 0;
            font-size: 1.2em;
        }
        .list-item p {
            margin: 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="resume-header">
            <h1>{{ $data['name'] }}</h1>
            <p>{{ $data['contact_info']['address'] }}</p>
            <p><a href="{{ $data['contact_info']['linkedin'] }}">{{ $data['contact_info']['linkedin'] }}</a></p>
            <p><a href="mailto:{{ $data['contact_info']['email'] }}">{{ $data['contact_info']['email'] }}</a></p>
            <p>{{ $data['contact_info']['mobile_number'] }}</p>
            <p><a href="{{ $data['contact_info']['github'] }}">{{ $data['contact_info']['github'] }}</a></p>
        </div>
        <div class="section">
            <h2 class="section-title">Career Objectives</h2>
            <p class="section-content">{{ $data['career_objectives'] }}</p>
        </div>
        <div class="section">
            <h2 class="section-title">Work Experience</h2>
            @foreach ($data['work_experience'] as $experience)
                <div class="list-item">
                    <h3>{{ $experience['title'] }} at {{ $experience['company'] }}</h3>
                    <p>{{ $experience['location'] }} | {{ $experience['start_date'] }} - {{ $experience['end_date'] }}</p>
                    <p>{{ $experience['responsibilities'] }}</p>
                </div>
            @endforeach
        </div>
        <div class="section">
            <h2 class="section-title">Education</h2>
            @foreach ($data['education'] as $edu)
                <div class="list-item">
                    <h3>{{ $edu['degree'] }} at {{ $edu['institution'] }}</h3>
                    <p>{{ $edu['location'] }} | {{ $edu['start_date'] }} - {{ $edu['end_date'] }}</p>
                </div>
            @endforeach
        </div>
        <div class="section">
            <h2 class="section-title">Skills</h2>
            <ul class="section-content">
                @foreach ($data['skills'] as $skill)
                    <li>{{ $skill }}</li>
                @endforeach
            </ul>
        </div>
        <div class="section">
            <h2 class="section-title">Projects</h2>
            @foreach ($data['projects'] as $project)
                <div class="list-item">
                    <h3>{{ $project['title'] }}</h3>
                    <p>{{ $project['description'] }}</p>
                </div>
            @endforeach
        </div>
        @foreach ($data['custom_sections'] ?? [] as $section => $items)
            <div class="section">
                <h2 class="section-title">{{ ucfirst(str_replace('_', ' ', $section)) }}</h2>
                @foreach ($items as $item)
                    <div class="list-item">
                        <h3>{{ $item['title'] }}</h3>
                        <p>{{ $item['description'] }}</p>
                    </div>
                @endforeach
            </div>
        @endforeach
        <div class="section">
            <h2 class="section-title">References</h2>
            @foreach ($data['references'] as $reference)
                <div class="list-item">
                    <p>{{ $reference['name'] }}</p>
                    <p>{{ $reference['contact'] }}</p>
                    <p><a href="mailto:{{ $reference['email'] }}">{{ $reference['email'] }}</a></p>
                </div>
            @endforeach
        </div>
    </div>
</body>
</html>
