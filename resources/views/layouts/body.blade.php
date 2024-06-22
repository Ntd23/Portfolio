<div class="container-fluid p-0 bg-info bg-gradient">
  <!-- About-->
  <section class="resume-section" id="about">
    <div class="resume-section-content">
      <h1 class="mb-0">
        {{ $about->name }}
      </h1>
      <div class="subheading mb-5">
        {{ $about->address }} · {{ $about->phone }} ·
        <a href="mailto:{{ $about->email }}">{{ $about->email }}</a>
      </div>
      <div class="social-icons">
        <a class="social-icon" href="{{ $about->linkedin_url }}"><i class="fab fa-linkedin-in"></i></a>
        <a class="social-icon" href="{{ $about->github_url }}"><i class="fab fa-github"></i></a>
        <a class="social-icon" href="{{ $about->facebook_url }}"><i class="fab fa-facebook-f"></i></a>
      </div>
    </div>
  </section>
  <hr class="m-0" />
  <!-- Experience-->
  <hr class="m-0" />
  <!-- Education-->
  <section class="resume-section" id="education">
    <div class="resume-section-content">
      <h2 class="mb-5">Education</h2>
      <div class="d-flex flex-column flex-md-row justify-content-between mb-5">
        <div class="flex-grow-1">
          <h3 class="mb-0">{{ $edu->school }}</h3>
          <div class="subheading mb-3">{{ $edu->degree }}</div>
          <div>{{ $edu->major }} - {{ $edu->objective }}</div>
        </div>
        <div class="flex-shrink-0"><span class="text-primary">{{ $edu->start_at }} - {{ $edu->end_at }}</span></div>
      </div>
    </div>
  </section>
  <hr class="m-0" />
  {{-- projects --}}
  <section class="resume-section" id="project">
    <div class="resume-section-content">
      <h2 class="mb-2">Project</h2>
      <div class="d-flex container-fluid align-items-center justify-content-between" style="padding-left: 0px;">
        @foreach ($projects as $project)
        <div class="card" style="width: 400px;">
          <a href="{{ $project->url }}" class="text-decoration-none">
            <img src="storage/{{ $project->image }}" class="card-img-top" alt="{{ $project->title }}">
            <div class="card-body">
              <h5 class="card-title">{{ $project->title }}</h5>
              <p class="card-text">{{ $project->descriptions }}</p>
            </div>
          </a>
        </div>
        @endforeach

      </div>
    </div>
  </section>
  <hr class="m-0" />
  <!-- Skills-->
  <section class="resume-section" id="skills">
    <div class="resume-section-content d-flex align-items-center">
      <div class="container">
        <h2 class="mb-5">Skills</h2>
        <div class="subheading mb-3">Programming Languages & Tools</div>
        <ul class="fa-ul mb-0">
          @foreach ($languages_tools as $item)
            <li>
              <span class="">{{ $item }}</span>
            </li>
          @endforeach
        </ul>
      </div>
      <div class="container" style="margin-top: 20px">
        <div class="subheading mb-3">Databases</div>
        <ul class="fa-ul mb-0">
          @foreach ($databases as $item)
            <li>
              <span class="">{{ $item }}</span>
            </li>
          @endforeach
        </ul>
      </div>
    </div>
  </section>
  <hr class="m-0" />
  <!-- Interests-->
  <section class="resume-section" id="interests">
    <div class="resume-section-content">
      <h2 class="mb-5">Interests</h2>
      <p>{{ $interest->descriptions }}</p>
    </div>
  </section>
  <hr class="m-0" />
  <!-- Awards-->
</div>
