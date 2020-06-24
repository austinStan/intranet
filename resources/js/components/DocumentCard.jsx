import React from "react";
import { InertiaLink } from "@inertiajs/inertia-react";
import ReactHtmlParser from "react-html-parser";

export default function DocumentCard({ document }) {
    // console.log(document);

    return (
        <div className="col-sm-12 col-lg-4 mt-3">
            <div className="document-card card-effect">
                <div className="">
                    <img
                        className="mt-3"
                        src="/assets/images/icons/paper.svg"
                        alt="Document Icon"
                    />

                    <InertiaLink href={`documents/${document.id}`}>
                        <div className="limit-1-lines">
                            <div>
                                <h4 className="text-center mt-3">
                                    {document && document.name
                                        ? document.name
                                        : ""}
                                </h4>
                            </div>
                        </div>
                    </InertiaLink>

                    <div className="limit-5-lines text-center">
                        <div>
                            {ReactHtmlParser(
                                document && document.description
                                    ? document.description
                                    : ""
                            )}
                        </div>
                    </div>

                    <a
                        href={document.link ? document.link : ""}
                        className="btn btn-primary btn-block mt-3 mb-3"
                        download
                    >
                        Download
                    </a>
                </div>
            </div>
        </div>
    );
}
