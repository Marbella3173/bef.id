<x-layout title="BEF.ID | Student Database">

    <div class="container" style="padding-top: 20px;">
        <h1 class="text-dark" style="margin-bottom: 15px;">Student Database</h1>

        <form style="margin-bottom: 50px" action="/search" method="get">
            @csrf
            <div class="d-flex mb-3">
                <input class="form-control me-2" type="search" placeholder="Enter student name" name="search" style="width: 700px">
                <button class="btn text-light" style="background-color: #38b6ff;">Search</button>
            </div>
        </form>
    </div>

    <div class="container">
        @if (sizeof($students) == 0)
            <div class="mx-auto" style="text-align: center; margin-top: 50px;">
                <h3 class="text-dark">No student data found.</h3>
            </div>
        @else
            <form action="/update-status" method="POST">
                @csrf
                <table class="table table-bordered">
                    <thead class="table">
                        <tr class="text-light text-center">
                            <th scope="col" style="background-color: #38b6ff;">Student Name</th>
                            <th scope="col" style="background-color: #38b6ff;">Parent Name</th>
                            <th scope="col" style="background-color: #38b6ff;">Email</th>
                            <th scope="col" style="background-color: #38b6ff;">Address</th>
                            <th scope="col" style="background-color: #38b6ff;">Phone Number</th>
                            <th scope="col" style="background-color: #38b6ff;">Status</th>
                            <th scope="col" style="background-color: #38b6ff;">Update Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($students as $student)
                        <tr class="align-middle text-light text-center">
                            <td class="align-middle text-center">{{ $student->studentName }}</td>
                            <td class="align-middle text-center">{{ $student->parentName }}</td>
                            <td class="align-middle text-center">{{ $student->parentEmail }}</td>
                            <td class="align-middle text-center">{{ $student->address }}</td>
                            <td class="align-middle text-center">{{ $student->phoneNumber }}</td>
                            <td class="align-middle text-center">{{ $student->user->status }}</td>
                            <td>
                                <div class="btn-group">
                                    <button type="button" 
                                            class="btn text-light dropdown-toggle" 
                                            data-bs-toggle="dropdown" 
                                            aria-expanded="false" 
                                            style="width:18vh; font-weight: bold; 
                                                   background-color: {{ $student->user->status == 'Verified' ? 'rgba(0, 204, 102)' : 'rgba(255, 179, 0)' }};">
                                        {{ $student->user->status }}
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <button class="dropdown-item" type="submit" name="statuses[{{ $student->userID }}]" value="Registered">
                                                Registered
                                            </button>
                                        </li>
                                        <li>
                                            <button class="dropdown-item" type="submit" name="statuses[{{ $student->userID }}]" value="Verified">
                                                Verified
                                            </button>
                                        </li>
                                    </ul>
                                </div>                                                                
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </form>
        @endif
    </div>

</x-layout>