@extends('layouts.app')

@section('content')
<div class="container-fluid">

    <!--Start Dashboard Content-->
    
    <div class="row mt-3">
      <div class="col-12 col-lg-6 col-xl-3">
        <div class="card gradient-bloody">
          <div class="card-body">
            <div class="media align-items-center">
            <div class="media-body">
              <p class="text-white">Total Orders</p>
              <h4 class="text-white line-height-5">8450</h4>
            </div>
            <div class="w-circle-icon rounded-circle border border-white">
              <i class="fa fa-cart-plus text-white"></i></div>
          </div>
          </div>
        </div>
      </div>
      <div class="col-12 col-lg-6 col-xl-3">
        <div class="card gradient-scooter">
          <div class="card-body">
            <div class="media align-items-center">
            <div class="media-body">
              <p class="text-white">Total Revenue</p>
              <h4 class="text-white line-height-5">$750</h4>
            </div>
            <div class="w-circle-icon rounded-circle border border-white">
              <i class="fa fa-money text-white"></i></div>
          </div>
          </div>
        </div>
      </div>
      <div class="col-12 col-lg-6 col-xl-3">
        <div class="card gradient-blooker">
          <div class="card-body">
            <div class="media align-items-center">
            <div class="media-body">
              <p class="text-white">New Users</p>
              <h4 class="text-white line-height-5">620</h4>
            </div>
            <div class="w-circle-icon rounded-circle border border-white">
              <i class="fa fa-users text-white"></i></div>
          </div>
          </div>
        </div>
      </div>
      <div class="col-12 col-lg-6 col-xl-3">
        <div class="card gradient-ohhappiness">
          <div class="card-body">
            <div class="media align-items-center">
            <div class="media-body">
              <p class="text-white">Bounce Rate</p>
              <h4 class="text-white line-height-5">12.80%</h4>
            </div>
            <div class="w-circle-icon rounded-circle border border-white">
              <i class="fa fa-pie-chart text-white"></i></div>
          </div>
          </div>
        </div>
      </div>
    </div><!--End Row-->

    <div class="row">
      <div class="col-12 col-lg-6">
        <div class="card">
          <div class="card-header">
              Last 7 Days Report
              <div class="card-action">
               <div class="dropdown">
               <a href="javascript:void();" class="dropdown-toggle dropdown-toggle-nocaret" data-toggle="dropdown">
                <i class="icon-options"></i>
               </a>
                  <div class="dropdown-menu dropdown-menu-right">
                  <a class="dropdown-item" href="javascript:void();">Action</a>
                  <a class="dropdown-item" href="javascript:void();">Another action</a>
                  <a class="dropdown-item" href="javascript:void();">Something else here</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="javascript:void();">Separated link</a>
                 </div>
                </div>
               </div>
              </div>
              <div class="card-body">
               <div class="chart-container-2">
                 <canvas id="dashboard-chart-1"></canvas>
               </div>
              </div>
        </div>
      </div>
      <div class="col-12 col-lg-6">
        <div class="card">
          <div class="card-header">
              Most Selling Items
              <div class="card-action">
               <div class="dropdown">
               <a href="javascript:void();" class="dropdown-toggle dropdown-toggle-nocaret" data-toggle="dropdown">
                <i class="icon-options"></i>
               </a>
                  <div class="dropdown-menu dropdown-menu-right">
                  <a class="dropdown-item" href="javascript:void();">Action</a>
                  <a class="dropdown-item" href="javascript:void();">Another action</a>
                  <a class="dropdown-item" href="javascript:void();">Something else here</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="javascript:void();">Separated link</a>
                 </div>
                </div>
               </div>
              </div>
              <div class="card-body">
              <div class="chart-container-2">
                <canvas id="dashboard-chart-2"></canvas>
              </div>
              </div>
        </div>
      </div>
    </div><!--End Row-->
        
        
    <div class="row">
      <div class="col-12 col-lg-12 col-xl-12">
        <div class="card">
             <div class="card-header">
              <i class="fa fa-area-chart"></i> Sales Report 
                  <div class="card-action">

            <div class="form-group mb-0">
              <select class="form-control form-control-sm">
                <option>Jan 18</option>
                <option>Feb 18</option>
                <option>Mar 18</option>
                <option>Apr 18</option>
                <option>May 18</option>
                <option>Jun 18</option>
                <option>Jul 18</option>
                <option>Aug 18</option>
                <option selected>Sept 18</option>
              </select>
            </div>
               </div>
              </div>
               <div class="card-body">
                 <div class="chart-container-1">
                   <canvas id="dashboard-chart-3"></canvas>
                 </div>
               </div>
        </div>
      </div>
      
    </div><!--End Row-->


    <div class="row">
       <div class="col-12 col-lg-6 col-xl-8">
         <div class="card">
           <div class="card-header border-0">
            New Customer List
          <div class="card-action">
           <div class="dropdown">
           <a href="javascript:void();" class="dropdown-toggle dropdown-toggle-nocaret" data-toggle="dropdown">
            <i class="icon-options"></i>
           </a>
            <div class="dropdown-menu dropdown-menu-right">
              <a class="dropdown-item" href="javascript:void();">Action</a>
              <a class="dropdown-item" href="javascript:void();">Another action</a>
              <a class="dropdown-item" href="javascript:void();">Something else here</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="javascript:void();">Separated link</a>
             </div>
            </div>
           </div>
          </div>
          <div class="table-responsive">
           <table class="table align-items-center table-flush">
             <thead>
              <tr>
               <th>Photo</th>
               <th>Name</th>
               <th>Username</th>
               <th>Email</th>
              </tr>
             </thead>
             <tbody>
               <tr>
                 <td><img src="{{ asset('') }}assets/images/avatars/avatar-1.png" class="rounded-circle customer-img" alt="user avatar"></td>
                 <td>Selina Jccoy</td>
                 <td>@selina</td>
                 <td>xyz@example.com</td>
               </tr>
               <tr>
                 <td><img src="{{ asset('') }}assets/images/avatars/avatar-2.png" class="rounded-circle customer-img" alt="user avatar"></td>
                 <td>Michle jhon</td>
                 <td>@Michle</td>
                 <td>xyz@example.com</td>
               </tr>
               <tr>
                 <td><img src="{{ asset('') }}assets/images/avatars/avatar-3.png" class="rounded-circle customer-img" alt="user avatar"></td>
                 <td>Jhon Deo</td>
                 <td>@deojhon</td>
                 <td>xyz@example.com</td>
               </tr>
               <tr>
                 <td><img src="{{ asset('') }}assets/images/avatars/avatar-4.png" class="rounded-circle customer-img" alt="user avatar"></td>
                 <td>Selina Jccoy</td>
                 <td>@selina</td>
                 <td>xyz@example.com</td>
               </tr>
               <tr>
                 <td><img src="{{ asset('') }}assets/images/avatars/avatar-5.png" class="rounded-circle customer-img" alt="user avatar"></td>
                 <td>Katrin jade</td>
                 <td>@Katrin</td>
                 <td>xyz@example.com</td>
               </tr>
             </tbody>
           </table>
         </div>
         </div>
       </div>
       <div class="col-12 col-lg-6 col-xl-4">
         <div class="card">
            <div class="card-header">Social Traffic</div>
            <div class="card-body">
               <div class="media align-items-center">
                 <div><i class="fa fa-facebook-square fa-2x text-facebook"></i></div>
                   <div class="media-body text-left ml-3">
                     <div class="progress-wrapper">
                       <p>Facebook <span class="float-right">65%</span></p>
                       <div class="progress" style="height: 7px;">
                        <div class="progress-bar bg-facebook" style="width:65%"></div>
                       </div>
                      </div>                   
                  </div>
                </div>
                <hr>
                <div class="media align-items-center">
                 <div><i class="fa fa-twitter fa-2x text-twitter"></i></div>
                   <div class="media-body text-left ml-3">
                     <div class="progress-wrapper">
                       <p>Twitter <span class="float-right">50%</span></p>
                       <div class="progress" style="height: 7px;">
                        <div class="progress-bar bg-twitter" style="width:50%"></div>
                       </div>
                      </div>                   
                  </div>
                </div>
                <hr>
                <div class="media align-items-center">
                 <div><i class="fa fa-dribbble fa-2x text-dribbble"></i></div>
                   <div class="media-body text-left ml-3">
                     <div class="progress-wrapper">
                       <p>Dribble <span class="float-right">70%</span></p>
                       <div class="progress" style="height: 7px;">
                        <div class="progress-bar bg-dribbble" style="width:70%"></div>
                       </div>
                      </div>                   
                  </div>
                </div>
                 <hr>
                <div class="media align-items-center">
                 <div><i class="fa fa-linkedin-square fa-2x text-linkedin"></i></div>
                   <div class="media-body text-left ml-3">
                     <div class="progress-wrapper">
                       <p>Linkedin <span class="float-right">35%</span></p>
                       <div class="progress" style="height: 7px;">
                        <div class="progress-bar bg-linkedin" style="width:35%"></div>
                       </div>
                      </div>                   
                  </div>
                </div>
                <hr>
                <div class="media align-items-center">
                 <div><i class="fa fa-youtube-square fa-2x text-youtube"></i></div>
                   <div class="media-body text-left ml-3">
                     <div class="progress-wrapper">
                       <p>Youtube <span class="float-right">5%</span></p>
                       <div class="progress" style="height: 7px;">
                        <div class="progress-bar bg-youtube" style="width:25%"></div>
                       </div>
                      </div>                   
                  </div>
                </div>
            </div>
          </div>
       </div>
    </div><!--End Row-->

    <div class="card">
      <div class="card-content">
        <div class="row row-group m-0 text-center">
          <div class="col-12 col-lg-3 col-xl-3">
            <div class="card-body">
               <span class="donut" data-peity='{ "fill": ["#5e72e4", "#f2f2f2"], "innerRadius": 45, "radius": 32 }'>4/5</span>
                <hr>
                <h6 class="mb-0">Total Viwes : 4521</h6>
            </div>
          </div>
          <div class="col-12 col-lg-3 col-xl-3">
            <div class="card-body">
              <span class="donut" data-peity='{ "fill": ["#ff2fa0", "#f2f2f2"], "innerRadius": 45, "radius": 32 }'>2/5</span>
              <hr>
                <h6 class="mb-0">Page Click : 4521</h6>
            </div>
          </div>
          <div class="col-12 col-lg-3 col-xl-3">
            <div class="card-body">
              <span class="donut" data-peity='{ "fill": ["#2dce89", "#f2f2f2"], "innerRadius": 45, "radius": 32 }'>3/5</span>
               <hr>
                <h6 class="mb-0">Server Load : 4521</h6>
            </div>
          </div>
           <div class="col-12 col-lg-3 col-xl-3">
            <div class="card-body">
              <span class="donut" data-peity='{ "fill": ["#172b4d", "#f2f2f2"], "innerRadius": 45, "radius": 32 }'>2/5</span>
               <hr>
                <h6 class="mb-0">Used RAM : 4521</h6>
            </div>
          </div>
        </div><!--End Row-->
      </div>
    </div>


    <div class="row">
      <div class="col-lg-12">
        <div class="card">
    <div class="card-header border-0">
              Recent Orders Table
      <div class="card-action">
       <div class="dropdown">
       <a href="javascript:void();" class="dropdown-toggle dropdown-toggle-nocaret" data-toggle="dropdown">
        <i class="icon-options"></i>
       </a>
          <div class="dropdown-menu dropdown-menu-right">
          <a class="dropdown-item" href="javascript:void();">Action</a>
          <a class="dropdown-item" href="javascript:void();">Another action</a>
          <a class="dropdown-item" href="javascript:void();">Something else here</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="javascript:void();">Separated link</a>
         </div>
        </div>
               </div>
              </div>
             <div class="table-responsive">
       
               <table class="table align-items-center table-flush">
                <thead>
                 <tr>
                   <th>Action</th>
                   <th>Product</th>
                   <th>Photo</th>
                   <th>Product ID</th>
                   <th>Status</th>
                   <th>Amount</th>
                   <th>Completion</th>
                 </tr>
                 </thead>
                 <tr>
                  <td>
                     <div class="icheck-material-primary">
                      <input type="checkbox" id="check1"/>
                      <label for="check1"></label>
                    </div>
                  </td>
                  <td>Iphone 5</td>
                  <td><img src="{{ asset('') }}assets/images/products/01.png" class="product-img" alt="product img"></td>
                  <td>#9405822</td>
                  <td><span class="btn btn-sm btn-outline-success btn-round btn-block">Paid</span></td>
                  <td>$ 1250.00</td>
                  <td><div class="progress shadow" style="height: 4px;">
                        <div class="progress-bar gradient-ohhappiness" role="progressbar" style="width: 100%"></div>
                     </div></td>
                 </tr>

                 <tr>
                  <td>
                     <div class="icheck-material-primary">
                      <input type="checkbox" id="check2"/>
                      <label for="check2"></label>
                    </div>
                  </td>
                  <td>Earphone GL</td>
                  <td><img src="{{ asset('') }}assets/images/products/02.png" class="product-img" alt="product img"></td>
                  <td>#9405820</td>
                  <td><span class="btn btn-sm btn-outline-info btn-round btn-block">Pending</span></td>
                  <td>$ 1500.00</td>
                  <td><div class="progress shadow" style="height: 4px;">
                        <div class="progress-bar gradient-scooter" role="progressbar" style="width: 80%"></div>
                     </div></td>
                 </tr>

                 <tr>
                  <td>
                     <div class="icheck-material-primary">
                      <input type="checkbox" id="check3"/>
                      <label for="check3"></label>
                    </div>
                  </td>
                  <td>HD Hand Camera</td>
                  <td><img src="{{ asset('') }}assets/images/products/03.png" class="product-img" alt="product img"></td>
                  <td>#9405830</td>
                  <td><span class="btn btn-sm btn-outline-danger btn-round btn-block">Failed</span></td>
                  <td>$ 1400.00</td>
                  <td><div class="progress shadow" style="height: 4px;">
                        <div class="progress-bar gradient-ibiza" role="progressbar" style="width: 60%"></div>
                     </div></td>
                 </tr>

                 <tr>
                  <td>
                     <div class="icheck-material-primary">
                      <input type="checkbox" id="check4"/>
                      <label for="check4"></label>
                    </div>
                  </td>
                  <td>Clasic Shoes</td>
                  <td><img src="{{ asset('') }}assets/images/products/04.png" class="product-img" alt="product img"></td>
                  <td>#9405825</td>
                  <td><span class="btn btn-sm btn-outline-success btn-round btn-block">Paid</span></td>
                  <td>$ 1200.00</td>
                  <td><div class="progress shadow" style="height: 4px;">
                        <div class="progress-bar gradient-ohhappiness" role="progressbar" style="width: 100%"></div>
                     </div></td>
                 </tr>

                 <tr>
                  <td>
                     <div class="icheck-material-primary">
                      <input type="checkbox" id="check5"/>
                      <label for="check5"></label>
                    </div>
                  </td>
                  <td>Hand Watch</td>
                  <td><img src="{{ asset('') }}assets/images/products/05.png" class="product-img" alt="product img"></td>
                  <td>#9405840</td>
                  <td><span class="btn btn-sm btn-outline-danger btn-round btn-block">Failed</span></td>
                  <td>$ 1800.00</td>
                  <td><div class="progress shadow" style="height: 4px;">
                        <div class="progress-bar gradient-ibiza" role="progressbar" style="width: 75%"></div>
                     </div></td>
                 </tr>

                  <tr>
                    <td>
                     <div class="icheck-material-primary">
                      <input type="checkbox" id="check6"/>
                      <label for="check6"></label>
                    </div>
                  </td>
                  <td>HD Hand Camera</td>
                  <td><img src="{{ asset('') }}assets/images/products/03.png" class="product-img" alt="product img"></td>
                  <td>#9405830</td>
                  <td><span class="btn btn-sm btn-outline-info btn-round btn-block">Pending</span></td>
                  <td>$ 1400.00</td>
                  <td><div class="progress shadow" style="height: 4px;">
                        <div class="progress-bar gradient-scooter" role="progressbar" style="width: 70%"></div>
                     </div></td>
                 </tr>

               </table>
             </div>
        </div>
      </div>
    </div><!--End Row-->

    <!--End Dashboard Content-->

</div>
@endsection