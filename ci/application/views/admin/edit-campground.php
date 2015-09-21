<div class="row">
                    <div class="box col-md-12">
                        <div class="box-inner">
                            <div class="box-header well" data-original-title="">
                                <h2><i class="glyphicon glyphicon-star-empty"></i> Edit / Delete Campground</h2>

                                <div class="box-icon">
                                    <a href="#" class="btn btn-minimize btn-round btn-default"><i
                                            class="glyphicon glyphicon-chevron-up"></i></a>
                                </div>
                            </div>

                            <div class="box-content">

                                <table class="table table-striped table-bordered bootstrap-datatable datatable responsive">
                                    <thead>
                                        <tr>
                                            <th>Headline</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <!-- get a list of Campground names, from the database -->
                                            <td>Coromandel Top 10 Holiday Park</td> 
                                            <td class="center">
                                                <a class="btn btn-info" href="#update-campground">
                                                    <i class="glyphicon glyphicon-edit icon-white"></i>
                                                    Edit
                                                </a>
                                                <a href="#" class="btn btn-danger btn-setting">
                                                    <i class="glyphicon glyphicon-trash icon-white"></i>
                                                    Delete
                                                </a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>

                            </div> <!-- content ends -->

                        </div> <!-- /box-inner -->
                    </div> <!-- /box col-md-12 -->
                </div><!--/row-->



<div class="row" id="update-campground">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well" data-original-title="">
                <h2><i class="glyphicon glyphicon-star-empty"></i> Update Campground</h2>

                <div class="box-icon">
                    
                    <a href="#" class="btn btn-minimize btn-round btn-default"><i
                            class="glyphicon glyphicon-chevron-up"></i></a>
                    
                </div>
            </div>
            <div class="box-content">
                <!-- put your content here -->
                <form role="form">
                                    <div class="form-group">
                                        <label for="page_title">Page Title</label>
                                        <input type="text" class="form-control" id="page_title" placeholder="Coromandel Top 10 Holiday Park">
                                    </div>
                                    <div class="form-group">
                                        <label for="meta_description">Meta Description</label>
                                        <input type="text" class="form-control" id="meta_description" placeholder="Coromandel Top 10 Holiday Park has cabins and tent sites">
                                    </div>
                                    <div class="form-group">
                                        <label for="title">Campground Name</label>
                                        <input type="text" class="form-control" id="campground-name" placeholder="Charter Name">
                                    </div>
                                    <div class="form-group">
                                        <label for="phone-number">Enter Phone Number</label>
                                        <input type="text" class="form-control" id="phone-number" placeholder="Phone Number">
                                    </div>

                                    <div class="form-group">
                                        <label for="email">Enter E-mail Address</label>
                                        <input type="text" class="form-control" id="email" placeholder="Email Address">
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="website">Enter Website</label>
                                        <input type="text" class="form-control" id="website" placeholder="Website">
                                    </div>

                                    <div class="form-group">
                                        <label for="tournament-img">Upload An Image</label>
                                        <input type="file" id="tournament-img">

                                        <p class="help-block">Example block-level help text here.</p>
                                    </div>

                                    <div class="control-group">
                                    <label class="control-label" for="selectError">Publish / Save</label>

                                    <div class="controls">
                                        <select id="selectError" data-rel="chosen">
                                            <option>Publish</option>
                                            <option>Save Draft</option>
                                        </select>
                                    </div>
                                    </div>
                                    <br>
                                    <button type="submit" class="btn btn-default">Submit</button>
                                </form>


            </div>
        </div>
    </div>
</div><!--/row-->