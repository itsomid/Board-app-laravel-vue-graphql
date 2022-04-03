export function gqlErrors(err) {
    return (err?.graphQLErrors || []).map(error => ({message:error.message}))
}
