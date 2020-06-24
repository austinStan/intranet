import React from "react";
import Layout from "../Layouts/Layout";

import StaffMembers from "../../components/StaffMembers";

export default function Department({ departments }) {
    // console.log(departments);

    return (
        <section>
            <div className="" style={{ marginTop: "10%" }}>
                <div className="container">
                    <h3
                        className="text-center "
                        style={{ color: "#2a9df4", fontWeight: "bold" }}
                    >
                        Department Name
                    </h3>

                    <div>
                        <h4>
                            Lorem ipsum dolor, sit amet consectetur adipisicing
                            elit. Pariatur nam iure assumenda, eius neque dicta
                            consequuntur dolorum architecto inventore, nobis
                            vero perferendis blanditiis illo, magnam repellat
                            nostrum ex ullam quia!
                        </h4>

                        <p>
                            vero perferendis blanditiis illo, magnam repellat
                            nostrum ex ullam quia!vero perferendis blanditiis
                            illo, magnam repellat nostrum ex ullam quia!
                        </p>

                        <p>
                            vero perferendis blanditiis illo, magnam repellat
                            nostrum ex ullam quia!vero perferendis blanditiis
                            illo, magnam repellat nostrum ex ullam quia!vero
                            perferendis blanditiis illo, magnam repellat nostrum
                            ex ullam quia!
                        </p>
                    </div>

                    <div className="row">
                        <StaffMembers />
                        <StaffMembers />
                        <StaffMembers />
                        <StaffMembers />
                        <StaffMembers />
                        <StaffMembers />
                    </div>
                </div>
            </div>
        </section>
    );
}

Department.layout = page => (
    <Layout children={page} title="Department | Kampala Hospital" />
);
