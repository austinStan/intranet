import React, { useEffect } from "react";
import Layout from "../Layouts/Layout";
import DocumentCard from "../../components/DocumentCard";
import Banner from "../../components/Banner";
import Sidebar from "../../components/Navigation/Sidebar";

import nProgress from "nprogress";
import "nprogress/nprogress.css";

export default function Documents({ documents }) {
    // console.log(documents);

    nProgress.start();
    // useEffect(() => {

    //     return () => {
    //         nnprogress.remove();
    //     };
    // }, []);

    return (
        <section style={{}}>
            <div>
                <Banner title="Documents" />

                <div className="">
                    <nav aria-label="breadcrumb ">
                        <ol className="breadcrumb">
                            <li className="breadcrumb-item">
                                <a href="/">Home</a>
                            </li>

                            <li className="breadcrumb-item active">
                                <a href="/documents" aria-current="page">
                                    Documents
                                </a>
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>

            <div className="" style={{ margin: "0 8%" }}>
                <div className="row">
                    <div className="col-sm-12 col-md-3 mt-3">
                        <Sidebar />
                    </div>

                    <div className="col-sm-12 col-md-9 mt-3">
                        <h2 className="single-page-headings">Documents</h2>

                        {documents && documents.length > 0 ? (
                            <div className="row mt-5">
                                {documents.map(document => (
                                    <DocumentCard
                                        key={document.id}
                                        document={document}
                                    />
                                ))}
                            </div>
                        ) : (
                            <h1
                                className="text-center"
                                style={{
                                    fontWeight: "bold",
                                    color: "#2a9df4",
                                    marginTop: "50px"
                                }}
                            >
                                No Documents available
                            </h1>
                        )}
                    </div>
                </div>
            </div>
        </section>
    );
}

Documents.layout = page => (
    <Layout children={page} title="Documents | Kampala Hospital" />
);
