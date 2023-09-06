<div>
  <div class="container">
      <h1>Create Job</h1>
      {{-- <form action="{{ route('submitJobForm') }}" method="POST">
          @csrf --}}

          {{-- <label for="JobReferenceID">Job Reference ID</label>
          <input type="text" name="JobReferenceID" required><br>

          <label for="JobTitle">Job Title</label>
          <input type="text" name="JobTitle" required><br>
          

          <label for="JobDescription">Job Description</label>
          <textarea name="JobDescription" rows="4"></textarea><br> --}}
          {{-- start --}}

           <!-- Loop through jobDispatches and display data -->
    <div class="w-full relative">
      <label class="tracking-wide text-gray-500 text-xs" for="SectorID">
        Sector ID
      </label>
      <select id="SectorID" wire:model='SectorID'
        class="w-full p-2 rounded input border-gray-400 text-base text-gray-600 focus:text-empex-green focus:border-green-600 focus:outline-none focus:ring-green-600"
        id="SectorID">
        <option hidden value="">Select Sector</option>
        @foreach ($sectors as $sector)
        <option value="{{ $sector->id }}"> {{ $sector->name ?? "" }}</option>
        @endforeach
      </select>
      @error('category')
      {{-- <p class="text-red-500 text-xs italic">{{ $message }}</p> --}}
      @enderror
    </div>

    <div class="w-full relative">
      <label class="tracking-wide text-gray-500 text-xs" for="IndustryID">
        Sector ID
      </label>
      <select id="IndustryID" wire:model='IndustryID'
        class="w-full p-2 rounded input border-gray-400 text-base text-gray-600 focus:text-empex-green focus:border-green-600 focus:outline-none focus:ring-green-600"
        id="IndustryID">
        <option hidden value="">Select Industry</option>
        @foreach ($industries as $industry)
        <option value="{{ $industry->id }}"> {{ $industry->name?? "" }}</option>
        @endforeach
      </select>
      @error('category')
      {{-- <p class="text-red-500 text-xs italic">{{ $message }}</p> --}}
      @enderror
    </div>

    <div class="w-full relative">
      <label class="tracking-wide text-gray-500 text-xs" for="JobNatureCode">
        Sector Job Nature
      </label>
      <select id="JobNatureCode" wire:model='JobNatureCode'
        class="w-full p-2 rounded input border-gray-400 text-base text-gray-600 focus:text-empex-green focus:border-green-600 focus:outline-none focus:ring-green-600"
        id="JobNatureCode">
        <option hidden value="">Select Industry</option>
        @foreach ($jobNatures as $jobNature)
        <option value="{{ $jobNature->id }}"> {{ $jobNature->code?? "" }}</option>
        @endforeach
      </select>
      @error('category')
      {{-- <p class="text-red-500 text-xs italic">{{ $message }}</p> --}}
      @enderror
    </div>

    <div class="w-full relative">
      <label class="tracking-wide text-gray-500 text-xs" for="category">
        Sector Minimum Qualification
      </label>
      <select id="MinQualificationID" wire:model='MinQualificationID'
        class="w-full p-2 rounded input border-gray-400 text-base text-gray-600 focus:text-empex-green focus:border-green-600 focus:outline-none focus:ring-green-600"
        id="MinQualificationID">
        <option hidden value="">Select Qualification</option>
        @foreach ($minqualifications as $minqualification)
        <option value="{{ $minqualification->id }}"> {{ $minqualification->name?? "" }}</option>
        @endforeach
      </select>
      @error('category')
      {{-- <p class="text-red-500 text-xs italic">{{ $message }}</p> --}}
      @enderror
    </div>


    {{-- <label for="SectorID">Sector ID</label>
    <input type="text" value="{{ $jobDispatch->sector->Name }}" name="SectorID" required><br>

    <label for="IndustryID">Industry ID</label>
    <input type="text" value="{{ $jobDispatch->industry->Name }}" name="IndustryID" required><br>

    <label for="MinQualificationID">MinQualificationID</label>
    <input type="text" value="{{ $jobDispatch->minQualification->Name }}" name="MinQualificationID" required><br>
    
    <label for="JobNatureCode">JobNatureCode</label>
    <input type="text" value="{{ $jobDispatch->jobNature->Name }}" name="JobNatureCode" required><br> --}}
    <!-- Add more fields as needed -->



          {{-- end --}}




        

          {{-- <label for="MinExperienceYear">Minimum Experience Year</label>
          <input type="text" name="MinExperienceYear"><br>

          <label for="MaxExperienceYear">Maximum Experience Year</label>
          <input type="text" name="MaxExperienceYear"><br>

          <label for="MinExpectedSalary">Min Expected Salary</label>
          <input type="text" name="MinExpectedSalary"><br>

          <label for="MaxExpectedSalary">Max Expected Salary</label>
          <input type="text" name="MaxExpectedSalary"><br>


          <label for="NumberofOpenings">Number of Openings</label>
          <input type="text" name="NumberofOpenings"><br>

          

          <label for="ContactPersonName">Contact Person Name</label>
          <input type="text" name="ContactPersonName"><br>

          <label for="ContactMobile">Contact Mobile</label>
          <input type="text" name="ContactMobile"><br>

          <label for="KeySkills">Key Skills</label>
          <textarea name="KeySkills" rows="2"></textarea><br> --}}

          <!-- Add more fields as needed -->

          <div class="flex justify-between md:justify-start mt-5">
            <div class="md:mr-2 ">
              <button type="submit" wire:click.prevent='submit' wire:loading.attr="disabled" wire:loading.class="bg-gray-400"
                wire:loading.class.remove="bg-empex-green hover:bg-green-500"
                class="uppercase focus:outline-none border border-transparent py-1 px-5 rounded text-center text-white bg-empex-green hover:bg-green-500 font-medium">
                <span wire:loading.remove wire:target='submit'>
                  Post job
                </span>
        
                <span wire:loading wire:target='submit'>
                  Posting...
                </span>
              </button>
            </div>
        
            <div class="md:ml-2 ">
              <button wire:click.prevent='cancel'
                class="uppercase focus:outline-none py-1 border-empex-green text-empex-green px-5 rounded text-center text-empex bg-white hover:bg-gray-100 font-medium border">Cancel</button>
            </div>
          </div>
  </div>
</div>