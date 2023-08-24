<div>
  <div class="container">
    <h1>Create Job</h1>
    <form action="{{ route('submitJobForm') }}" method="POST">
        @csrf

        <label for="JobReferenceID">Job Reference ID</label>
        <input type="text" value="345678ii2" name="JobReferenceID" required><br>

        <label for="JobTitle">Job Title</label>
        <input type="text" value="SUNNY  SALES PROMOTER ONE" name="JobTitle" required><br>

        <label for="JobDescription">Job Description</label>
        <input  type="text" name="JobDescription" value="Sunny We are looking for Senior developers on Wordpress" required><br>

        <label for="SectorID">Sector ID</label>
        <input type="text" value="13" name="SectorID" required><br>

        <label for="IndustryID">Industry ID</label>
        <input type="text" value="16" name="IndustryID" required><br>

        <label for="MinExperienceYear">Minimum Experience Year</label>
        <input type="text" value="15" name="MinExperienceYear" required><br>

        <label for="MaxExperienceYear">Maximum Experience Year</label>
        <input type="text" value="15" name="MaxExperienceYear" required><br>

        <label for="MinExpectedSalary">MinExpectedSalary</label>
        <input type="text" value="10000" name="MinExpectedSalary" required><br>

        <label for="MaxExpectedSalary">MaxExpectedSalary</label>
        <input type="text" value="100000" name="MaxExpectedSalary" required><br>








        <label for="SalaryType">SalaryType</label>
        <input type="text"  value="Y" name="SalaryType" required><br>

        <label for="JobNatureCode">JobNatureCode</label>
        <input type="text" value="C" name="JobNatureCode" required><br>

        <label for="MinAge">MinAge</label>
        <input type="text" value="28"  name="MinAge" required><br>

        <label for="MaxAge">MaxAge</label>
        <input type="text"  value="35" name="MaxAge" required><br>

        <label for="GenderCode">GenderCode</label>
        <input type="text" value="A" name="GenderCode" required><br>

        <label for="NumberofOpenings">NumberofOpenings</label>
        <input type="text" value="150" name="NumberofOpenings" required><br>

        <label for="MinQualificationID">MinQualificationID</label>
        <input type="text" value="9" name="MinQualificationID" required><br>

        <label for="ContactPersonName">ContactPersonName</label>
        <input type="text" value="Amit Kumar" name="ContactPersonName" required><br>

        <label for="ContactMobile">ContactMobile</label>
        <input type="text" value="8130132255" name="ContactMobile" required><br>

        <label for="ContactEmail">ContactEmail</label>
        <input type="text" value="amit.k@abc.com" name="ContactEmail" required><br>

        <label for="IsToDisplayContactInformation">IsToDisplayContactInformation</label>
        <input type="text" value="1" name="IsToDisplayContactInformation" required><br>

        <label for="IsToDisplayMobileOfEmployer">IsToDisplayMobileOfEmployer</label>
        <input type="text" value="1" name="IsToDisplayMobileOfEmployer" required><br>

        <label for="IsToDisplayMobileOfEmployer">IsToDisplayMobileOfEmployer</label>
        <input type="text" value="1" name="IsToDisplayMobileOfEmployer" required><br>

        <label for="Keyskills">Keyskills</label>
        <input type="text" name="Keyskills[]" value="Skill 1">
<input type="text" name="Keyskills[]" value="Skill 2">

        <label for="JobPostExpiryDate">JobPostExpiryDate</label>
        <input type="text" value="2023-08-30" name="JobPostExpiryDate" required><br>

        <label for="UGQualificationID">UGQualificationID</label>
        <input type="text" value="7" name="UGQualificationID" required><br>

        <label for="UGSpecializationID">UGSpecializationID</label>
        <input type="text" value="24" name="UGSpecializationID" required><br>

        <label for="UGYearFrom">UGYearFrom</label>
        <input type="text" value="1999" name="UGYearFrom" required><br>

        <label for="UGYearTo">UGYearTo</label>
        <input type="text" value="2001" name="UGYearTo" required><br>

        <label for="PGQualificationID">PGQualificationID</label>
        <input type="text" value="8" name="PGQualificationID" required><br>

        <label for="PGSpecializationID">PGSpecializationID</label>
        <input type="text" value="25" name="PGSpecializationID" required><br>

        <label for="PGYearFrom">PGYearFrom</label>
        <input type="text" value="2000" name="PGYearFrom" required><br>

        <label for="PGYearTo">PGYearTo</label>
        <input type="text" value="2003" name="PGYearTo" required><br>

        <label for="PHDQualificationID">PHDQualificationID</label>
        <input type="text" value="17" name="PHDQualificationID" required><br>

        <label for="PHDSpecializationID">PHDSpecializationID</label>
        <input type="text" value="108" name="PHDSpecializationID" required><br>

        <label for="PHDYearFrom">PHDYearFrom</label>
        <input type="text" value="2001"  name="PHDYearFrom" required><br>

        <label for="PHDYearTo">PHDYearTo</label>
        <input type="text" value="2005" name="PHDYearTo" required><br>

        <label for="PostedForEmployer">PostedForEmployer</label>
        <input type="text" value="Bharat" name="PostedForEmployer" required><br>

        {{-- <label for="JobLocations">JobLocations</label>
        <input type="text" value="jaipur" name="JobLocations" required><br> --}}

        <label for="JobLocations">JobLocations</label>
{{-- <textarea name="JobLocations" rows="2"></textarea> --}}

<input type="text" name="JobLocations[]" value="66468">
<input type="text" name="JobLocations[]" value="9">
        {{-- <label for="ApplyJobUrl">ApplyJobUrl</label>
        <input type="text" name="ApplyJobUrl" required><br> --}}

        <label for="FunctionalAreaID">FunctionalAreaID</label>
        <input type="text" value="33" name="FunctionalAreaID" required><br>

        <label for="FunctionalRoleID">FunctionalRoleID</label>
        <input type="text" value="679" name="FunctionalRoleID" required><br>

        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" type="submit">Create Job</button>
    </form>
</div>
      <script>
        $(document).ready(function () {
          $('#description').on('change keyup paste', function (e) {
            var data = $(this).val();
            @this.set('description', data);
          });
        });
      </script>
      
      <script src="https://cdn.tiny.cloud/1/vht8bgfmk42s3epjyw0o4n8n61x93u4egnrswpj13dwdvi7d/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
      <script>
        $(document).ready(function() {
                  window.initSelect2=()=>{
              tinymce.init({
                selector: '#description',
                height: '400',
                forced_root_block: false,
                setup: function (editor) {
                  editor.on('init change', function () {
                  editor.save();
                });
                editor.on('change', function (e) {
                  @this.set('description', editor.getContent());
                });}
              });
      
                      $("#ncos").select2({
                          allowClear: true,
                          placeholder:"Select NCO(multiple)"
                      });
                  }
      
                  initSelect2();
      
                  $('#ncos').on('change', function (e) {
                      @this.set('nco', $(this).val());
                  });
      
                  window.livewire.on('select2AutoInit',()=>{
                      initSelect2();
                  });
              });
      </script>
