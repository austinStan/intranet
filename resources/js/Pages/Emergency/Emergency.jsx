import React, { useEffect } from "react";
import Layout from "../Layouts/Layout";
import EmergencyCard from "../../components/EmergencyCard";
import Banner from "../../components/Banner";
import Sidebar from "../../components/Navigation/Sidebar";

import nProgress from "nprogress";
import "nprogress/nprogress.css";

function Emergency({ emergency_contacts }) {
    // console.log(emergency_contacts);

    nProgress.start();
    // useEffect(() => {

    //     return () => {
    //         nnprogress.remove();
    //     };
    // }, []);

    return (
        <section style={{}}>
            <div>
                <Banner title="Emergency Contacts" />

                <div className="">
                    <nav aria-label="breadcrumb ">
                        <ol className="breadcrumb">
                            <li className="breadcrumb-item">
                                <a href="/">Home</a>
                            </li>

                            <li className="breadcrumb-item active">
                                <a href="/emergency" aria-current="page">
                                    Emergency
                                </a>
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>

            <div className="container">
                <div className="row">
                    <div className="col-sm-12 col-md-3">
                        <Sidebar />
                    </div>

                    <div className="col-sm-12 col-md-9">
                        <h2 className="single-page-headings">
                            Emergency Contacts
                        </h2>

                        <div className="row">
                            {emergency_contacts &&
                            emergency_contacts.length > 0 ? (
                                <>
                                    {emergency_contacts.map(contact => (
                                        <EmergencyCard
                                            key={contact.id}
                                            contact={contact}
                                        />
                                    ))}
                                </>
                            ) : (
                                <h3>No Emergency Contacts available</h3>
                            )}
                        </div>
                    </div>
                </div>
            </div>
        </section>
    );
}

Emergency.layout = page => (
    <Layout children={page} title="Emergency | Kampala Hospital" />
);

export default Emergency;
