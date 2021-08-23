<div class="row">
    <div class="col-sm-12 col-md-12 mx-auto">
        <div class="card my-5">
            <div class="card-body">
                <?php if ($this->session->flashdata('success')) : ?>
                    <div class="alert alert-success">
                        <?php
                        echo $this->session->flashdata('success');
                        $this->session->unset_userdata('success');
                        ?>
                    </div>
                <?php endif; ?>

                <?php if ($this->session->flashdata('failed')) : ?>
                    <div class="alert alert-danger">
                        <?php
                        echo $this->session->flashdata('failed');
                        $this->session->unset_userdata('failed');
                        ?>
                    </div>
                <?php endif; ?>
                <h2>List of All Pokemons</h2>

                <table id="example" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Picture</th>
                            <th>Type</th>
                            <th>Owned By</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($pokemon_list as $pokemon) {
                            echo "<tr>";
                            echo "<td>$pokemon->id</td>";
                            echo "<td>$pokemon->name</td>";
                            echo "<td><img src='$pokemon->picture'></td>";
                            echo "<td>$pokemon->type</td>";
                            if ($pokemon->owner_status == NULL) {
                                echo "<td>Not owned</td>";
                                if (!is_null($this->session->userdata('username'))) {
                                    echo "<td><a href='" . base_url('/welcome/catch/' . $pokemon->id) . "'><button class='btn btn-primary btn-sm'>catch</button></a></td>";
                                } else {
                                    echo "<td></td>";
                                }
                            } else {
                                echo "<td>Owned</td>";
                                echo "<td></td>";
                            }
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>