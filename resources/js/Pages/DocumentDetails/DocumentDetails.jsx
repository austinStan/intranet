import React, { useEffect } from "react";
import Layout from "../Layouts/Layout";
import ReactHtmlParser from "react-html-parser";

import Banner from "../../components/Banner";
import Sidebar from "../../components/Navigation/Sidebar";

import nProgress from "nprogress";
import "nprogress/nprogress.css";

export default function DocumentDetails({ document }) {
    nProgress.start();
    // useEffect(() => {

    //     return () => {
    //         nnprogress.remove();
    //     };
    // }, []);
    return (
        <section style={{}}>
            <div>
                <Banner title={document.name ? document.name : ""} />

                <div className="">
                    <nav aria-label="breadcrumb ">
                        <ol className="breadcrumb">
                            <li className="breadcrumb-item">
                                <a href="/">Home</a>
                            </li>

                            <li className="breadcrumb-item">
                                <a href="/documents">Documents</a>
                            </li>

                            <li
                                className="breadcrumb-item active"
                                aria-current="page"
                            >
                                {document.name ? document.name : ""}
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>

            <div>
                <div className="container">
                    <div className="row">
                        <div className="col-sm-12 col-md-3">
                            <Sidebar />
                        </div>

                        <div className="col-sm-12 col-md-9">
                            <h1 className="" style={{ color: "#2a9df4" }}>
                                {document.name ? document.name : ""}
                            </h1>

                            <div>
                                {ReactHtmlParser(
                                    document.description
                                        ? document.description
                                        : ""
                                )}
                            </div>

                            <a
                                href={document.image ? document.image : ""}
                                className="btn btn-primary"
                                download
                            
                            >

                                Download Document
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    );
}

DocumentDetails.layout = page => (
    <Layout children={page} title="Document Details | Kampala Hospital" />
);
