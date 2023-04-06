<div class="row ">
    <div class="col-12 grid-margin">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Team Members</h4>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th> Name</th>
                                <th> Email Address</th>
                                <th> Phone Number</th>
                                <th> Role</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $team->viewMember();
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>