<section style="background-color: #eee;">
    <div class="container py-5">
      
      <div class="row">
        <div class="col-lg-4">
          <div class="card mb-4">
            <div class="card-body text-center">
              <img src="{{ url('/public/images/'.(empty($user->image_path)?'default.png':$user->image_path)) }}" alt="avatar"
                class="rounded-circle img-fluid" style="width: 150px;">
              <h5 class="my-3">{{ $user->name }}</h5>
            </div>
          </div>
          
        </div>
        <div class="col-lg-8">
          <div class="card mb-4">
            <div class="card-body">
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Full Name</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0">{{ $user->name }}</p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Email</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0">{{ $user->email }}</p>
                </div>
              </div>
              @if($user->is_admin==false)
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Phone</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0">{{ $user->phone_number }}</p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Identity Card No</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0">{{ $user->ic_number }}</p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Gender</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0">{{ $user->gender }}</p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Date of Birth</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0">{{ $user->date_of_birth }}</p>
                </div>
              </div>
            </div>
            @endif
          </div>
        </div>
      </div>
    </div>
  </section>