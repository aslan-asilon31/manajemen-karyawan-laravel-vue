@extends('../layouts/app_welcome');

@section('content')
<div class="row flex-column-reverse flex-md-row">
    <div class="col-md-8">
        <form action="{{route('users.update', $user->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <div class="mb-4">
                        <div class="d-flex flex-column flex-md-row text-center text-md-start mb-3">
                            <figure class="me-4 flex-shrink-0">
                                <img width="100" class="rounded-pill"
                                     src="{{ asset("cakeadmin/images/user/anonymous.png")}}" alt="...">
                            </figure>
                            <div class="flex-fill">
                                <h5 class="mb-3">user edit</h5>
                                {{-- <a type="file" class="btn btn-primary me-2">Change Avatar</a> --}}
                                <input type="file" class="form-control" name="image">
                                <button class="btn btn-outline-danger btn-icon" data-bs-toggle="tooltip" title="Remove Avatar">
                                    <i class="bi bi-trash me-0"></i>
                                </button>
                                <p class="small text-muted mt-3">For best results, use an image at least
                                    256px by 256px in either .jpg or .png format</p>
                            </div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-body">
                                <h6 class="card-title mb-4">User Information</h6>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Name</label>
                                            <input type="text" class="form-control" value="{{ old('name', $user->name) }}" name="name" placeholder="insert your name ...">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Email</label>
                                            <input type="email" class="form-control" value="{{ old('email', $user->email) }}" name="email" placeholder="insert your email ...">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">SOP</label>
                                            <input type="file" class="form-control" value="{{ old('file_id2', $user->file_id2) }}" name="sop">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Other Files</label>
                                            <input type="file" class="form-control" value="{{ old('file_id3', $user->file_id3) }}" name="file_other">
                                        </div>

                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Role</label>
                                            <select class="form-select" name="role_id">
                                                <option value="">All</option>
                                                @forelse ($roles as $role)
                                                <option value="{{ old('role_id', $user->role_id) }}">{{ $role->name }}</option>
                                                @empty
                                                <option value="">no role</option>
                                                @endforelse
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Department</label>
                                            <select class="form-select" name="department_id">
                                                <option value="">All</option>
                                                @forelse ($departments as $department)
                                                <option value="{{ old('department_id', $user->department_id) }}">{{ $department->name }}</option>
                                                @empty
                                                <option value="">no department</option>
                                                @endforelse
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">CV</label>
                                            <input type="file" class="form-control" value="{{ old('file_id1', $user->file_id1) }}" name="cv">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Birth Place</label>
                                            <input type="text" class="form-control" value="{{ old('place_birth', $user->place_birth) }}" name="place_birth" placeholder="insert your birth place ...">
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Date of Birth</label>
                                        <div class="d-flex gap-3">
                                            <select class="form-select" name="date">
                                                <option selected hidden>Day</option>
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                                <option>5</option>
                                                <option>6</option>
                                                <option>7</option>
                                                <option>8</option>
                                                <option>9</option>
                                                <option>10</option>
                                                <option>11</option>
                                                <option>12</option>
                                                <option>13</option>
                                                <option>14</option>
                                                <option>15</option>
                                                <option>16</option>
                                                <option>17</option>
                                                <option>18</option>
                                                <option>19</option>
                                                <option >20</option>
                                                <option>21</option>
                                                <option>22</option>
                                                <option>23</option>
                                                <option>24</option>
                                                <option>25</option>
                                                <option>26</option>
                                                <option>27</option>
                                                <option>28</option>
                                                <option>29</option>
                                                <option>30</option>
                                            </select>
                                            <select class="form-select" name="month">
                                                <option>Month</option>
                                                <option selected hidden>Jan</option>
                                                <option>Feb</option>
                                                <option>Mar</option>
                                                <option>Apr</option>
                                                <option>May</option>
                                                <option>Jun</option>
                                                <option>Jul</option>
                                                <option>Aug</option>
                                                <option>Sep</option>
                                                <option>Oct</option>
                                                <option>Nov</option>
                                                <option>Dec</option>
                                            </select>
                                            <select class="form-select" name="year">
                                                <option selected hidden>Year</option>
                                                <option>2024</option>
                                                <option>2023</option>
                                                <option>2022</option>
                                                <option>2021</option>
                                                <option>2020</option>
                                                <option>2019</option>
                                                <option>2018</option>
                                                <option>2017</option>
                                                <option>2016</option>
                                                <option>2015</option>
                                                <option>2014</option>
                                                <option>2013</option>
                                                <option>2012</option>
                                                <option>2011</option>
                                                <option>2010</option>
                                                <option>2009</option>
                                                <option>2008</option>
                                                <option>2007</option>
                                                <option>2006</option>
                                                <option>2005</option>
                                                <option>2004</option>
                                                <option>2003</option>
                                                <option>2002</option>
                                                <option>2001</option>
                                                <option>2000</option>
                                                <option>1999</option>
                                                <option>1998</option>
                                                <option>1997</option>
                                                <option>1996</option>
                                                <option>1995</option>
                                                <option>1994</option>
                                                <option>1993</option>
                                                <option>1992</option>
                                                <option>1991</option>
                                                <option>1990</option>
                                                <option>1989</option>
                                                <option>1988</option>
                                                <option>1987</option>
                                                <option>1986</option>
                                                <option>1985</option>
                                                <option>1984</option>
                                                <option>1983</option>
                                                <option>1982</option>
                                                <option>1981</option>
                                                <option>1980</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button type="submit">Submit</button>

        </form>

    </div>

    <div class="col-md-4">
        <div class="card sticky-top mb-4 mb-md-0">
            <div class="card-body">
                <ul class="nav nav-pills flex-column gap-2" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" id="profile-tab" data-bs-toggle="tab" href="#profile" role="tab"
                           aria-controls="profile" aria-selected="true">
                            <i class="bi bi-person me-2"></i> Profile
                        </a>
                    </li>
                    
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection